<?php

namespace Brightree\Soap;

use BackedEnum;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionProperty;
use ReflectionType;
use ReflectionUnionType;
use RuntimeException;

/**
 * Turns a decoded SOAP response back into one of this library's request DTOs.
 *
 * SoapClient hands responses back as stdClass, and the typed operation
 * wrappers take DTOs, so the most common Brightree workflow — fetch a record,
 * change two fields, send it back — has no path through the typed API. This
 * class is that path:
 *
 *   $response = $service->salesOrderFetchByBrightreeID(555);
 *   $order = $response->SalesOrderFetchByBrightreeIDResult->Items->SalesOrder;
 *
 *   $items = ResponseHydrator::hydrateMany(SalesOrderItemInfo::class, $order->SalesOrderItems);
 *   $items[0]->ChargeAmt = 30.00;
 *
 *   $service->salesOrderUpdateItem(555, $items[0]->BrightreeDetailID, $items[0]);
 *
 * Everything is driven by the DTO's own declared property types, read by
 * reflection — there is no classmap, no schema lookup and no per-type
 * registration to keep in step with the WSDLs.
 *
 * Four behaviours are worth knowing about, because each one exists to stop a
 * specific way a round trip loses data.
 *
 * **A property missing from the response is left alone.** It is not set to
 * null. RequestPruner omits an unset property and emits xsi:nil for one that
 * is present and null, and against a WCF endpoint those mean opposite things:
 * "leave this field alone" versus "blank it". Writing null for an absent
 * property would defeat the pruner on the very next call and blank fields
 * server-side. A property the response *does* carry as xsi:nil arrives here as
 * null and is skipped for the same reason — the field is already null
 * server-side, so omitting it changes nothing, while sending it back as an
 * explicit nil would be a needless write.
 *
 * **Collections are normalised to plain lists.** A repeating element comes
 * back inside a wrapper object keyed by the repeated element's name
 * ({"Payors": {"SalesOrderItemPayorInfo": [...]}}), and ext-soap collapses
 * that inner value to a single object rather than a one-element array whenever
 * the element occurs once — the asymmetry every consumer ends up writing an
 * is_array() guard for. Both shapes, and the empty wrapper Brightree sends for
 * an empty collection, land in the DTO as a plain list of 0, 1 or n items.
 * That is also the shape ext-soap re-encodes correctly: a list and the wrapper
 * object produce byte-identical request XML.
 *
 * **Nested objects hydrate into whatever the property declares**, all the way
 * down, and into the instance the DTO built in its constructor where there is
 * one, so a graph a caller is part-way through assigning into is not replaced
 * underneath them.
 *
 * **Nothing about the data throws.** Response types are sometimes supersets of
 * request types, and an enum can gain a case server-side between releases.
 * Anything that cannot be carried across is skipped and reported through the
 * by-reference $skipped argument rather than raised, so an unrelated field
 * drifting cannot fail a call that never touched it. Only structural problems
 * — a class that does not exist, a graph deeper than MAX_DEPTH — raise.
 */
final class ResponseHydrator {
  /**
   * Backstop for a response that nests absurdly deeply. A decoded SOAP
   * response is a tree, so it cannot cycle, and no Brightree type comes close
   * to this depth; exceeding it means something is very wrong.
   */
  private const MAX_DEPTH = 64;

  /**
   * Per-class property descriptors, built once by reflection.
   *
   * @var array<class-string, array<string, array{property: ReflectionProperty, type: ?ReflectionType, list: bool, item: ?string}>>
   */
  private static array $schema = [];

  /**
   * Imports of an already-parsed file, so a docblock item type can be resolved
   * the way PHP would resolve it.
   *
   * @var array<string, array<string, class-string>>
   */
  private static array $imports = [];

  /**
   * Hydrate one response object into a new instance of $class.
   *
   * @template T of object
   * @param class-string<T> $class A request DTO to fill.
   * @param object|array<string, mixed> $response One decoded response node.
   * @param string[]|null $skipped Receives a dotted path for everything that
   *        could not be carried across: properties the DTO does not declare,
   *        and values its declared type cannot hold. Always assigned, so it is
   *        an empty array when the whole node came over cleanly.
   * @return T
   */
  public static function hydrate(string $class, object|array $response, ?array &$skipped = null): object {
    $skipped = [];

    return self::fill(self::instantiate($class), $response, self::shortName($class), $skipped, 0);
  }

  /**
   * Hydrate a collection of response objects into a list of $class.
   *
   * Takes the wrapper as it arrives — {"SalesOrderItemInfo": [...]} — or the
   * inner value on its own, and always returns a list, so the one-versus-many
   * asymmetry never reaches the caller.
   *
   * @template T of object
   * @param class-string<T> $class
   * @param string[]|null $skipped See hydrate().
   * @return list<T>
   */
  public static function hydrateMany(string $class, mixed $response, ?array &$skipped = null): array {
    $skipped = [];

    if (!class_exists($class)) {
      throw new RuntimeException('Cannot hydrate into ' . $class . ': no such class.');
    }

    /** @var list<T> */
    return self::collection($class, $response, self::shortName($class), $skipped, 0);
  }

  /**
   * Copy every property the response carries onto an existing DTO instance.
   *
   * @param object|array<string, mixed> $source
   * @param string[] $skipped
   */
  private static function fill(object $target, object|array $source, string $path, array &$skipped, int $depth): object {
    if ($depth > self::MAX_DEPTH) {
      // Returning the target half-filled would drop the rest of the branch
      // silently, which is the failure this class exists to prevent.
      throw new RuntimeException(
          'Response nests deeper than ' . self::MAX_DEPTH . ' levels at ' . $path . '. No Brightree type is '
          . 'anywhere near that deep, so this is almost certainly not a Brightree response.'
      );
    }

    $schema = self::schemaOf($target::class);

    foreach (self::propertiesOf($source) as $name => $value) {
      $field = $schema[$name] ?? null;

      if ($field === null) {
        // A response type that is a superset of the request type. Documented
        // as dropped rather than raised: the caller asked for the request
        // shape, and the extra field has nowhere to go.
        $skipped[] = $path . '.' . $name;
        continue;
      }

      // Absent and nil both mean "this field needs no write". See the class
      // docblock: assigning null here is what would blank the field.
      if ($value === null) {
        continue;
      }

      $here = $path . '.' . $name;

      if ($field['list']) {
        $target->$name = self::collection($field['item'], $value, $here, $skipped, $depth + 1);
        continue;
      }

      $class = self::objectTypeOf($field['type']);

      if ($class !== null && (is_object($value) || is_array($value))) {
        $target->$name = self::fill(
            self::existing($target, $field['property'], $class),
            $value,
            $here,
            $skipped,
            $depth + 1
        );
        continue;
      }

      [$assignable, $coerced] = self::coerce($field['type'], $value);

      if (!$assignable) {
        $skipped[] = $here;
        continue;
      }

      $target->$name = $coerced;
    }

    return $target;
  }

  /**
   * Normalise whatever arrived for a repeating element into a plain list,
   * hydrating each entry into $item when that resolves to a class.
   *
   * @param string[] $skipped
   * @return list<mixed>
   */
  private static function collection(?string $item, mixed $value, string $path, array &$skipped, int $depth): array {
    if (is_array($value)) {
      // Already the repeated element itself, either because the caller set
      // SOAP_SINGLE_ELEMENT_ARRAYS or because more than one came back.
      $elements = array_values($value);
    } elseif (is_object($value)) {
      $elements = self::unwrap($item, $value);
    } else {
      // A bare scalar where a collection was declared: one element, not none.
      $elements = [$value];
    }

    // An enum is a class too, and new-ing one is a fatal error. No Brightree
    // WSDL declares a collection of a restricted string — none of the 274
    // ArrayOf* types wraps a simpleType — so entries here are only ever
    // objects or plain scalars, and the guard is there to keep it that way.
    $hydrate = $item !== null && class_exists($item) && !enum_exists($item);
    $list = [];

    foreach ($elements as $index => $element) {
      // A nillable repeated element can arrive as a nil, which is an absence
      // and has no place in the list.
      if ($element === null) {
        continue;
      }

      if ($hydrate && (is_object($element) || is_array($element))) {
        $list[] = self::fill(self::instantiate($item), $element, $path . '[' . $index . ']', $skipped, $depth + 1);
        continue;
      }

      $list[] = $element;
    }

    return $list;
  }

  /**
   * Take the repeated element out of its ArrayOf wrapper.
   *
   * Across all twelve Brightree WSDLs every ArrayOf* type names its child
   * after the item type — 274 of 274 — so the item class's short name
   * identifies the wrapper's payload exactly. The fallbacks below cover the
   * shapes that name cannot settle: an empty wrapper, a wrapper whose item
   * type the DTO never documented, and a value that turns out to be a single
   * element rather than a wrapper at all.
   *
   * @return list<mixed>
   */
  private static function unwrap(?string $item, object $wrapper): array {
    $properties = get_object_vars($wrapper);

    // Brightree sends the wrapper with no children for an empty collection.
    if ($properties === []) {
      return [];
    }

    $key = $item === null ? null : self::shortName($item);

    if ($key !== null && array_key_exists($key, $properties)) {
      $inner = $properties[$key];
    } elseif (self::looksLikeAnElement($item, $properties)) {
      // Everything it carries is a field of the item type, so it is one
      // element rather than a wrapper around some. Without this an element
      // that happens to carry a single field would be mistaken for a wrapper
      // and unwrapped down to that field's value.
      return [$wrapper];
    } elseif (count($properties) === 1) {
      $inner = reset($properties);
    } else {
      // Several children and none named for the item type: not a wrapper.
      return [$wrapper];
    }

    return is_array($inner) ? array_values($inner) : [$inner];
  }

  /**
   * Whether an object is one element of the collection rather than the wrapper
   * around it, judged by whether the item type declares everything it carries.
   *
   * Only consulted when the wrapper's own name did not settle it, and only
   * meaningful when the item type is known and the object carries something.
   *
   * @param array<string, mixed> $properties
   */
  private static function looksLikeAnElement(?string $item, array $properties): bool {
    if ($item === null || !class_exists($item)) {
      return false;
    }

    return array_diff_key($properties, self::schemaOf($item)) === [];
  }

  /**
   * The instance to hydrate a nested object into: the one the DTO's
   * constructor already built where it fits, so a graph the caller is part-way
   * through assigning into survives, and a fresh one otherwise.
   */
  private static function existing(object $target, ReflectionProperty $property, string $class): object {
    if ($property->isInitialized($target)) {
      $current = $property->getValue($target);

      if ($current instanceof $class) {
        return $current;
      }
    }

    return self::instantiate($class);
  }

  /**
   * @param object|array<string, mixed> $source
   * @return array<string, mixed>
   */
  private static function propertiesOf(object|array $source): array {
    return is_array($source) ? $source : get_object_vars($source);
  }

  /**
   * @template T of object
   * @param class-string<T> $class
   * @return T
   */
  private static function instantiate(string $class): object {
    if (!class_exists($class)) {
      throw new RuntimeException('Cannot hydrate into ' . $class . ': no such class.');
    }

    $constructor = (new ReflectionClass($class))->getConstructor();

    if ($constructor !== null && $constructor->getNumberOfRequiredParameters() > 0) {
      throw new RuntimeException(
          'Cannot hydrate into ' . $class . ': its constructor requires arguments. Request DTOs are '
          . 'expected to be constructible with none.'
      );
    }

    return new $class();
  }

  /**
   * Fit a wire value to a declared type.
   *
   * Two passes, both in declaration order so a union resolves to its first
   * workable member. The first takes the value as it stands; the second
   * converts, which is not optional — ext-soap decodes xs:decimal to a string
   * to preserve precision, and every money field on a Brightree DTO is
   * declared float.
   *
   * @return array{0: bool, 1: mixed} Whether the value is assignable, and the value to assign.
   */
  private static function coerce(?ReflectionType $type, mixed $value): array {
    $names = self::typeNames($type);

    // An untyped or mixed property takes anything.
    if ($names === [] || in_array('mixed', $names, true)) {
      return [true, $value];
    }

    $actual = get_debug_type($value);

    foreach ($names as $name) {
      if ($name === $actual) {
        return [true, $value];
      }

      if (!self::isBuiltin($name) && $value instanceof $name) {
        return [true, $value];
      }

      // A restricted string in the schema is a backed enum on the DTO, but it
      // is a plain string on the wire.
      $enum = !self::isBuiltin($name) && enum_exists($name) && is_a($name, BackedEnum::class, true);

      if ($enum && (is_string($value) || is_int($value))) {
        $case = $name::tryFrom($value);

        if ($case !== null) {
          return [true, $case];
        }
      }
    }

    if (!is_scalar($value)) {
      return [false, null];
    }

    foreach ($names as $name) {
      if ($name === 'float' && is_numeric($value)) {
        return [true, (float) $value];
      }

      if ($name === 'int' && is_numeric($value) && (float) $value === floor((float) $value)) {
        return [true, (int) $value];
      }

      if ($name === 'string') {
        return [true, is_bool($value) ? ($value ? 'true' : 'false') : (string) $value];
      }

      if ($name === 'bool' && in_array($value, [0, 1, '0', '1', 'true', 'false'], true)) {
        return [true, $value === 'true' || $value === 1 || $value === '1'];
      }
    }

    return [false, null];
  }

  /**
   * The class a property expects a nested object in, or null when it expects
   * a scalar. Enums are scalars here: they arrive as strings, not as nodes.
   *
   * @return class-string|null
   */
  private static function objectTypeOf(?ReflectionType $type): ?string {
    foreach (self::typeNames($type) as $name) {
      if (self::isBuiltin($name) || enum_exists($name)) {
        continue;
      }

      if (class_exists($name)) {
        return $name;
      }
    }

    return null;
  }

  /**
   * Named types in declaration order. Intersection types have no meaning for a
   * DTO property and none appear in this library, so they yield nothing.
   *
   * @return list<string>
   */
  private static function typeNames(?ReflectionType $type): array {
    if ($type instanceof ReflectionNamedType) {
      return [$type->getName()];
    }

    if ($type instanceof ReflectionUnionType) {
      $names = [];

      foreach ($type->getTypes() as $member) {
        if ($member instanceof ReflectionNamedType) {
          $names[] = $member->getName();
        }
      }

      return $names;
    }

    return [];
  }

  private static function isBuiltin(string $name): bool {
    return in_array($name, ['int', 'float', 'string', 'bool', 'array', 'object', 'mixed', 'null', 'never', 'void', 'callable', 'iterable', 'false', 'true'], true);
  }

  /**
   * Describe a DTO's public instance properties once.
   *
   * @return array<string, array{property: ReflectionProperty, type: ?ReflectionType, list: bool, item: ?string}>
   */
  private static function schemaOf(string $class): array {
    if (isset(self::$schema[$class])) {
      return self::$schema[$class];
    }

    $fields = [];

    foreach ((new ReflectionClass($class))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
      if ($property->isStatic()) {
        continue;
      }

      $type = $property->getType();
      $names = self::typeNames($type);

      $fields[$property->getName()] = [
        'property' => $property,
        'type' => $type,
        'list' => in_array('array', $names, true),
        'item' => self::itemTypeOf($property),
      ];
    }

    return self::$schema[$class] = $fields;
  }

  /**
   * The element type of a collection property, from its @var docblock.
   *
   * PHP's type system stops at `array`, so the item type lives in the
   * docblock the generator emits beside every collection — `@var
   * SalesOrderItemPayorInfo[]`. It is written as the source file sees it, so
   * it is resolved the same way PHP would: leading backslash, then the file's
   * imports, then the declaring class's own namespace.
   *
   * @return class-string|string|null A class, a scalar hint such as "int", or null.
   */
  private static function itemTypeOf(ReflectionProperty $property): ?string {
    $doc = $property->getDocComment();

    if ($doc === false) {
      return null;
    }

    if (!preg_match('/@var\s+(?:list<|array<(?:[^,>]+,\s*)?)?(\\\\?)([A-Za-z_][A-Za-z0-9_\\\\]*)(?:\[\]|>)/', $doc, $matches)) {
      return null;
    }

    [, $leading, $name] = $matches;

    if (self::isBuiltin($name)) {
      return $name;
    }

    // A leading backslash is already fully qualified; nothing to resolve.
    if ($leading === '\\') {
      return class_exists($name) || enum_exists($name) ? $name : null;
    }

    $declaring = $property->getDeclaringClass();
    $imported = self::importsOf($declaring->getFileName() ?: '')[$name] ?? null;

    foreach ([$imported, $declaring->getNamespaceName() . '\\' . $name, $name] as $candidate) {
      if ($candidate !== null && (class_exists($candidate) || enum_exists($candidate))) {
        return $candidate;
      }
    }

    return $name;
  }

  /**
   * Class imports of a source file, keyed by the alias the file uses.
   *
   * Reflection reports a docblock verbatim and says nothing about the imports
   * in scope around it, so the `use` statements have to be read back off the
   * file. Only the header matters — imports precede the class — and the result
   * is cached per file.
   *
   * @return array<string, class-string>
   */
  private static function importsOf(string $file): array {
    if (isset(self::$imports[$file])) {
      return self::$imports[$file];
    }

    if ($file === '' || !is_readable($file)) {
      return self::$imports[$file] = [];
    }

    $source = (string) file_get_contents($file);
    $header = preg_split('/^\s*(?:abstract\s+|final\s+|readonly\s+)*(?:class|interface|trait|enum)\s/mi', $source, 2)[0];
    $imports = [];

    // `use function` and `use const` import symbols that can never be a
    // property's type, and matching them would map an alias onto the wrong
    // thing entirely.
    preg_match_all(
        '/^\s*use\s+(?!function\s|const\s)([A-Za-z_][A-Za-z0-9_\\\\]*)(?:\s+as\s+([A-Za-z_][A-Za-z0-9_]*))?\s*;/mi',
        $header,
        $matches,
        PREG_SET_ORDER
    );

    foreach ($matches as $match) {
      $fqcn = $match[1];
      $alias = $match[2] ?? self::shortName($fqcn);
      $imports[$alias] = $fqcn;
    }

    return self::$imports[$file] = $imports;
  }

  private static function shortName(string $class): string {
    $separator = strrpos($class, '\\');

    return $separator === false ? $class : substr($class, $separator + 1);
  }
}
