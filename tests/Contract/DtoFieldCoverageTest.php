<?php

namespace Brightree\Tests\Contract;

use Brightree\Tests\Support\WsdlSchema;
use Brightree\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use ReflectionClass;
use ReflectionProperty;

/**
 * Keeps the hand-written DTOs honest against the schema.
 *
 * A property whose name is not a field on the matching complexType is dead
 * weight: ext-soap drops it without a word, so whatever the caller assigned
 * never leaves the process. Usually it means a typo, or a field Brightree has
 * since renamed.
 *
 * The check is one-directional on purpose. A DTO is allowed to omit fields —
 * plenty of these types have a hundred and are populated a handful at a time —
 * but it may not carry one the schema has never heard of.
 */
final class DtoFieldCoverageTest extends TestCase {
  /**
   * Namespaces holding hand-written DTOs. Brightree\Types is generated from
   * the WSDLs, so checking it would only test the generator against itself.
   *
   * @var string[]
   */
  private const DTO_NAMESPACES = [
    'ApiMessageServices',
    'CommonServices',
    'Patient',
    'SalesOrder',
    'DocumentManagement',
  ];

  /**
   * The handful of places where a class name deliberately differs from the
   * WSDL type it stands for, each with the reason.
   *
   * A key of the form Class::$Property documents a property whose PHP type is
   * not named after its schema type. Those are informational: field coverage
   * compares names, and both pairs below are field-for-field identical.
   *
   * @var array<string, string>
   */
  private const TYPE_ALIASES = [
    // Namespaced away from the generated SalesOrder types; same fields.
    'Brightree\\SalesOrder\\SalesOrderDeliveryInfo' => 'SalesOrderDeliveryInfo',
    // Shared across services, so it lives under CommonServices.
    'Brightree\\CommonServices\\ResponsibleParty' => 'ResponsibleParty',
    // The WSDL calls the type OrderingDoctor; its fields are DoctorInfo's.
    'Brightree\\CommonServices\\ClinicalInfo::$OrderingDoctor' => 'DoctorInfo',
    // WSDL SecUser extends LookupValue and adds nothing, so LookupValue is used.
    'Brightree\\DocumentManagement\\DocumentBatch::$BatchOwner' => 'LookupValue',
  ];

  /**
   * @return iterable<string, array{string}>
   */
  public static function dtoClasses(): iterable {
    foreach (self::DTO_NAMESPACES as $namespace) {
      $directory = self::projectRoot() . '/src/Brightree/' . $namespace;

      foreach (glob($directory . '/*.php') ?: [] as $file) {
        $class = 'Brightree\\' . $namespace . '\\' . basename($file, '.php');

        if (class_exists($class)) {
          yield $namespace . '\\' . basename($file, '.php') => [$class];
        }
      }
    }
  }

  #[DataProvider('dtoClasses')]
  public function testEveryPublicPropertyIsAFieldOnTheMatchingComplexType(string $class): void {
    $type = self::TYPE_ALIASES[$class] ?? substr($class, strrpos($class, '\\') + 1);
    $fields = [];
    $found = [];

    foreach ($this->availableWsdls() as $name => $path) {
      $declared = WsdlSchema::load($path)->fieldsOfType($type);

      if ($declared === null) {
        continue;
      }

      $found[] = $name;
      $fields = array_merge($fields, $declared);
    }

    if ($found === []) {
      $this->markTestSkipped(
          'No complexType named "' . $type . '" in any available WSDL, so ' . $class
          . ' is not a mirror of a schema type and has nothing to be checked against.'
      );
    }

    $fields = array_values(array_unique($fields));
    $unknown = array_values(array_diff($this->publicProperties($class), $fields));

    $this->assertSame(
        [],
        $unknown,
        $class . ' declares ' . count($unknown) . ' propert' . (count($unknown) === 1 ? 'y' : 'ies')
        . ' that the WSDL complexType "' . $type . '" (declared in ' . implode(', ', $found)
        . ') does not have: ' . implode(', ', $unknown) . '.' . PHP_EOL
        . 'ext-soap drops an unknown property without an error, so anything assigned to '
        . 'it never reaches Brightree.'
    );
  }

  /**
   * @return string[]
   */
  private function publicProperties(string $class): array {
    $names = [];

    foreach ((new ReflectionClass($class))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
      if (!$property->isStatic()) {
        $names[] = $property->getName();
      }
    }

    return $names;
  }
}
