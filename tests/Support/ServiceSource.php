<?php

namespace Brightree\Tests\Support;

use ReflectionClass;

/**
 * Reads the operation names and argument keys the service classes hand to
 * apiCall(), straight out of their source.
 *
 * Reflection cannot see this: the operation and its keys are literals inside a
 * method body. The source is tokenised rather than matched with a regular
 * expression, so a bracket or a comma inside a quoted string cannot throw the
 * depth counting off.
 */
final class ServiceSource {
  /**
   * Every apiCall() in a service class.
   *
   * @param class-string $class
   * @return array<int, array{method: string, line: int, operation: string, keys: string[]}>
   */
  public static function operationCalls(string $class): array {
    $file = (new ReflectionClass($class))->getFileName();

    if ($file === false) {
      throw new \RuntimeException($class . ' has no source file to read.');
    }

    return self::parse((string) file_get_contents($file));
  }

  /**
   * @return array<int, array{method: string, line: int, operation: string, keys: string[]}>
   */
  private static function parse(string $source): array {
    /** @var array<int, array{0: int|null, 1: string, 2: int}> $tokens */
    $tokens = [];

    foreach (token_get_all($source) as $token) {
      $tokens[] = is_array($token) ? [$token[0], $token[1], $token[2]] : [null, $token, 0];
    }

    $calls = [];
    $method = '{unknown}';
    $count = count($tokens);

    for ($i = 0; $i < $count; $i++) {
      [$id, $text] = $tokens[$i];

      if ($id === T_FUNCTION) {
        $name = self::next($tokens, $i);

        if ($name !== null && $tokens[$name][0] === T_STRING) {
          $method = $tokens[$name][1];
        }

        continue;
      }

      if ($id !== T_STRING || $text !== 'apiCall') {
        continue;
      }

      $previous = self::previous($tokens, $i);

      if ($previous === null || $tokens[$previous][0] !== T_OBJECT_OPERATOR) {
        continue;
      }

      $call = self::readCall($tokens, $i);

      if ($call !== null) {
        $calls[] = ['method' => $method, 'line' => $tokens[$i][2]] + $call;
      }
    }

    return $calls;
  }

  /**
   * Read `('Operation', ['Key' => ...])` starting at the apiCall token.
   *
   * @param array<int, array{0: int|null, 1: string, 2: int}> $tokens
   * @return array{operation: string, keys: string[]}|null
   */
  private static function readCall(array $tokens, int $index): ?array {
    $open = self::next($tokens, $index);

    if ($open === null || $tokens[$open][1] !== '(') {
      return null;
    }

    $operationToken = self::next($tokens, $open);

    if ($operationToken === null || $tokens[$operationToken][0] !== T_CONSTANT_ENCAPSED_STRING) {
      // A dynamic operation name, as CustomTrait::custom() uses. Nothing to
      // check against the WSDL.
      return null;
    }

    $operation = self::unquote($tokens[$operationToken][1]);
    $comma = self::next($tokens, $operationToken);

    if ($comma === null || $tokens[$comma][1] !== ',') {
      return ['operation' => $operation, 'keys' => []];
    }

    $arrayStart = self::next($tokens, $comma);

    if ($arrayStart === null || $tokens[$arrayStart][1] !== '[') {
      // The payload is a variable or an object rather than a literal map.
      return null;
    }

    return ['operation' => $operation, 'keys' => self::readKeys($tokens, $arrayStart)];
  }

  /**
   * Collect the keys of the literal array that opens at $start.
   *
   * @param array<int, array{0: int|null, 1: string, 2: int}> $tokens
   * @return string[]
   */
  private static function readKeys(array $tokens, int $start): array {
    $keys = [];
    $brackets = 0;
    $parentheses = 0;
    $count = count($tokens);

    for ($i = $start; $i < $count; $i++) {
      [$id, $text] = $tokens[$i];

      if ($id === null) {
        if ($text === '[') {
          $brackets++;
          continue;
        }

        if ($text === ']') {
          $brackets--;

          if ($brackets === 0) {
            return $keys;
          }

          continue;
        }

        if ($text === '(') {
          $parentheses++;
          continue;
        }

        if ($text === ')') {
          $parentheses--;
          continue;
        }
      }

      if ($id === T_ARRAY) {
        continue;
      }

      // Only the outermost level of this array names operation parameters; a
      // nested array or a call argument does not.
      if ($brackets !== 1 || $parentheses !== 0 || $id !== T_CONSTANT_ENCAPSED_STRING) {
        continue;
      }

      $arrow = self::next($tokens, $i);

      if ($arrow !== null && $tokens[$arrow][0] === T_DOUBLE_ARROW) {
        $keys[] = self::unquote($text);
      }
    }

    return $keys;
  }

  /**
   * @param array<int, array{0: int|null, 1: string, 2: int}> $tokens
   */
  private static function next(array $tokens, int $index): ?int {
    $count = count($tokens);

    for ($i = $index + 1; $i < $count; $i++) {
      if (!self::skippable($tokens[$i][0])) {
        return $i;
      }
    }

    return null;
  }

  /**
   * @param array<int, array{0: int|null, 1: string, 2: int}> $tokens
   */
  private static function previous(array $tokens, int $index): ?int {
    for ($i = $index - 1; $i >= 0; $i--) {
      if (!self::skippable($tokens[$i][0])) {
        return $i;
      }
    }

    return null;
  }

  private static function skippable(?int $id): bool {
    return $id === T_WHITESPACE || $id === T_COMMENT || $id === T_DOC_COMMENT;
  }

  private static function unquote(string $literal): string {
    $body = substr($literal, 1, -1);

    if (str_starts_with($literal, "'")) {
      return str_replace(['\\\\', "\\'"], ['\\', "'"], $body);
    }

    return stripcslashes($body);
  }
}
