<?php

namespace Brightree\Soap;

use SoapClient;

/**
 * Hands out SoapClient instances, reusing one per (WSDL, options) pair.
 *
 * Constructing a SoapClient parses the whole WSDL, and for a remote URL that
 * means downloading it first. Brightree's are large — SalesOrderService is
 * ~388 KB, PatientService ~324 KB — so building a fresh client for every
 * operation, as this library used to, put a full HTTPS fetch and parse in
 * front of each call. Clients are stateless between calls apart from the
 * trace buffer, so reusing them is safe and removes that cost entirely.
 */
final class SoapClientFactory {
  /**
   * Enough for every Brightree service several times over; the cap only
   * matters for a long-running worker that rotates credentials.
   *
   * @var int
   */
  private const MAX_CLIENTS = 32;

  /** @var array<string, SoapClient> */
  private static array $clients = [];

  /**
   * Overrides how clients are built. Exists so tests can capture the request
   * XML without a network round trip; production code leaves it null.
   *
   * @var (callable(string, array<string, mixed>): SoapClient)|null
   */
  private static $factory = null;

  /**
   * @param array<string, mixed> $options
   */
  public static function make(string $wsdl, array $options): SoapClient {
    $key = $wsdl . '|' . self::fingerprint($options);

    if (isset(self::$clients[$key])) {
      return self::$clients[$key];
    }

    if (count(self::$clients) >= self::MAX_CLIENTS) {
      array_shift(self::$clients);
    }

    $client = self::$factory === null ? new SoapClient($wsdl, $options) : (self::$factory)($wsdl, $options);

    return self::$clients[$key] = $client;
  }

  /**
   * Install a custom client builder, or pass null to restore the default.
   * Flushes the cache so the change takes effect immediately.
   *
   * @param (callable(string, array<string, mixed>): SoapClient)|null $factory
   */
  public static function using(?callable $factory): void {
    self::$factory = $factory;
    self::flush();
  }

  /**
   * Drop every cached client. Useful in tests, and after changing credentials
   * or SSL options in a long-running process.
   */
  public static function flush(): void {
    self::$clients = [];
  }

  /**
   * @param array<string, mixed> $options
   */
  private static function fingerprint(array $options): string {
    $parts = [];

    foreach ($options as $name => $value) {
      $parts[$name] = self::fingerprintValue($value);
    }

    ksort($parts);

    return md5((string) json_encode($parts));
  }

  /**
   * Credentials arrive as top-level scalars, so they are part of the key and
   * two logins can never share a client.
   *
   * Arrays are walked rather than json_encode'd wholesale, because json_encode
   * cannot see into a closure — a 'typemap' whose only difference is a
   * callback body would otherwise fingerprint identically and collide onto one
   * client. Closures fall back to spl_object_id, which distinguishes any two
   * that are alive at the same time; ids are reused after collection, so two
   * closures with disjoint lifetimes could still collide. Nothing in this
   * library passes a closure, so that stays theoretical.
   */
  private static function fingerprintValue(mixed $value): mixed {
    if ($value === null || is_scalar($value)) {
      return $value;
    }

    if (is_array($value)) {
      return array_map(self::fingerprintValue(...), $value);
    }

    if (is_resource($value)) {
      return 'resource#' . get_resource_id($value);
    }

    if (is_object($value)) {
      return 'object#' . spl_object_id($value);
    }

    return 'unknown';
  }
}
