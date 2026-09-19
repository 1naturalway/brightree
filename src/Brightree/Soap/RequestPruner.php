<?php

namespace Brightree\Soap;

use BackedEnum;
use DateTimeInterface;
use RuntimeException;
use SoapParam;
use SoapVar;
use stdClass;

/**
 * Strips unset values out of a request payload before it reaches SoapClient.
 *
 * Brightree's services are WCF DataContract endpoints, where an element
 * carrying xsi:nil="true" means "set this field to null" — which is *not* the
 * same as omitting the element, which means "leave this field alone". PHP's
 * encoder emits xsi:nil for any property that is present and null, and omits
 * the element entirely for a property that is absent.
 *
 * The DTOs in this library build their nested objects eagerly so callers can
 * write $order->DeliveryInfo->Address->City = 'Dayton' without a pile of
 * null checks. Handed straight to SoapClient that convenience turns into
 * hundreds of xsi:nil elements per request, and on an Update operation those
 * can blank out fields the caller never touched. Pruning the payload first
 * keeps the ergonomics and sends only what was actually populated.
 *
 * What is dropped: null, empty arrays, and objects whose properties all
 * dropped. What is kept: false, 0, 0.0 and '' — those are real values a
 * caller may well have meant. Backed enums are unwrapped to their value, and
 * SoapVar/SoapParam are passed through untouched so callers can still hand
 * build a node when they need exact control.
 *
 * To send an explicit null, bypass pruning with BaseService::$prune = false.
 */
final class RequestPruner {
  /**
   * Backstop for a payload that nests absurdly deeply without repeating an
   * object. Cycles are caught by identity tracking, not by this, and no
   * Brightree type comes close, so exceeding it means something is wrong.
   */
  private const MAX_DEPTH = 64;

  /**
   * Prune whatever was handed to an operation.
   *
   * The wrapper methods always pass a name => value map, but custom() lets a
   * caller pass an object or a pre-built SoapVar instead, so handle those too.
   * Pruning never turns a payload into null: an operation called with nothing
   * populated still has to be called.
   */
  public static function payload(mixed $query): mixed {
    if (is_array($query)) {
      return self::arguments($query);
    }

    if (is_object($query) && !$query instanceof SoapVar && !$query instanceof SoapParam) {
      // An empty result still has to be sent as an object, but sending the
      // original graph would put back every nil this class exists to remove.
      return self::value($query) ?? new stdClass();
    }

    return $query;
  }

  /**
   * Prune the top-level argument map for an operation.
   *
   * @param array<string, mixed> $arguments
   * @return array<string, mixed>
   */
  public static function arguments(array $arguments): array {
    $pruned = [];

    foreach ($arguments as $name => $value) {
      $value = self::value($value);

      if ($value !== null) {
        $pruned[$name] = $value;
      }
    }

    return $pruned;
  }

  /**
   * Prune a single value, returning null when nothing survives.
   *
   * @param array<int, bool> $path Object ids on the current branch.
   */
  public static function value(mixed $value, int $depth = 0, array $path = []): mixed {
    if ($value === null) {
      return null;
    }

    if ($depth > self::MAX_DEPTH) {
      // Returning null here would drop the branch silently, which is the very
      // failure this class exists to prevent.
      throw new RuntimeException(
          'Request payload nests deeper than ' . self::MAX_DEPTH . ' levels. No Brightree type is '
          . 'anywhere near that deep, so this is almost certainly an unintended object graph.'
      );
    }

    // Unwrap enum-typed properties to the string the WSDL expects. SoapClient
    // already does this, but normalising here keeps the pruned payload plain.
    if ($value instanceof BackedEnum) {
      return $value->value;
    }

    // Caller-built nodes are deliberate; never second-guess them.
    if ($value instanceof SoapVar || $value instanceof SoapParam) {
      return $value;
    }

    // A date object has no public properties, so it would otherwise prune away
    // to nothing. The DTOs type their date fields as strings, but custom() and
    // the generated types accept anything, so normalise here.
    if ($value instanceof DateTimeInterface) {
      return $value->format('c');
    }

    if (is_scalar($value)) {
      return $value;
    }

    if (is_array($value)) {
      return self::pruneArray($value, $depth, $path);
    }

    if (is_object($value)) {
      return self::pruneObject($value, $depth, $path);
    }

    return $value;
  }

  /**
   * @param array<mixed> $value
   * @param array<int, bool> $path
   * @return array<mixed>|null
   */
  private static function pruneArray(array $value, int $depth, array $path): ?array {
    // ext-soap serialises a repeating element only from a packed list: give it
    // [0 => $a, 2 => $b] and it emits nothing at all, silently. Any all-integer
    // array is therefore repacked, which covers the gaps left by unset() or
    // array_filter(). String keys are left alone because those arrays are
    // name => value maps, where the keys carry the meaning.
    $repack = $value === [] || array_filter(array_keys($value), 'is_string') === [];
    $pruned = [];

    foreach ($value as $key => $item) {
      $item = self::value($item, $depth + 1, $path);

      if ($item === null) {
        continue;
      }

      if ($repack) {
        $pruned[] = $item;
      } else {
        $pruned[$key] = $item;
      }
    }

    // An empty array still serialises as an empty collection element, which
    // reads to the server as "replace this collection with nothing".
    return $pruned === [] ? null : $pruned;
  }

  /**
   * Objects become stdClass: SoapClient binds by the WSDL element name and
   * declared type rather than by PHP class, so the class name is irrelevant
   * on the wire, and get_object_vars() conveniently skips typed properties
   * that were never initialised.
   *
   * @param array<int, bool> $path
   */
  private static function pruneObject(object $value, int $depth, array $path): ?stdClass {
    // Tracking identity along the current branch, rather than relying on depth
    // alone, is what makes a cycle terminate. A depth cap on its own does not:
    // an object that references a cycle twice branches, so the walk costs
    // 2^depth and exhausts memory long before the cap is reached.
    $id = spl_object_id($value);

    if (isset($path[$id])) {
      return null;
    }

    // By value, so each branch walks with its own path. The same object
    // reachable twice side by side is a diamond, not a cycle, and is still
    // pruned on both branches; only a genuine back-reference is cut.
    $path[$id] = true;

    $pruned = new stdClass();
    $kept = false;

    foreach (get_object_vars($value) as $name => $property) {
      $property = self::value($property, $depth + 1, $path);

      if ($property === null) {
        continue;
      }

      $pruned->$name = $property;
      $kept = true;
    }

    return $kept ? $pruned : null;
  }
}
