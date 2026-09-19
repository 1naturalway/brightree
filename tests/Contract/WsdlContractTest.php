<?php

namespace Brightree\Tests\Contract;

use Brightree\Services\BaseService;
use Brightree\Tests\Support\ServiceSource;
use Brightree\Tests\Support\WsdlSchema;
use Brightree\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * Drift detector between the service wrappers and the WSDLs they wrap.
 *
 * Brightree revises these contracts without telling anyone, and a renamed
 * parameter does not fail loudly: ext-soap simply leaves the value out and the
 * server records the operation as if the field had not been sent. This test is
 * how that gets noticed, so every failure names the operation, the wrapping
 * method and its line.
 *
 * Nothing here hardcodes an operation list. Both sides are read: the wrappers
 * from src/Brightree/Services, the contracts from the WSDLs.
 */
final class WsdlContractTest extends TestCase {
  /**
   * Service class => WSDL basename. The two disagree often enough — and the
   * casing of patientservice is Brightree's, not a typo — that the mapping has
   * to be written down.
   *
   * @return iterable<string, array{string, string}>
   */
  public static function services(): iterable {
    $map = [
      'CustomFieldService' => 'CustomFieldService',
      'DoctorService' => 'DoctorService',
      'DocumentManagementService' => 'DocumentManagementService',
      'InsuranceService' => 'InsuranceService',
      'InventoryService' => 'InventoryService',
      'PatientBillingService' => 'InvoiceService',
      'PatientService' => 'patientservice',
      'PickupExchangeService' => 'PickupExchangeService',
      'PricingService' => 'PricingService',
      'ReferenceDataService' => 'ReferenceDataService',
      'SalesOrderService' => 'SalesOrderService',
      'SecurityService' => 'UserSecurityService',
    ];

    foreach ($map as $service => $wsdl) {
      yield $service => ['Brightree\\Services\\' . $service, $wsdl];
    }
  }

  /**
   * Every operation a method calls must exist in the portType. A typo, or an
   * operation Brightree has retired, fails here.
   *
   * @param class-string<BaseService> $class
   */
  #[DataProvider('services')]
  public function testEveryOperationUsedExistsInTheWsdl(string $class, string $wsdl): void {
    $schema = WsdlSchema::load($this->wsdl($wsdl));
    $operations = $schema->operations();

    $this->assertNotEmpty($operations, $wsdl . '.wsdl declares no operations at all; it is probably truncated.');

    foreach (ServiceSource::operationCalls($class) as $call) {
      $this->assertContains(
          $call['operation'],
          $operations,
          $class . '::' . $call['method'] . '() (line ' . $call['line'] . ') calls the operation "'
          . $call['operation'] . '", which ' . $wsdl . '.wsdl does not declare.'
      );
    }
  }

  /**
   * The argument keys have to match the request wrapper's child elements
   * exactly. A key the schema does not know is dropped in silence, and a
   * parameter the wrapper never sends is a field the caller cannot reach.
   *
   * @param class-string<BaseService> $class
   */
  #[DataProvider('services')]
  public function testEveryOperationsArgumentsMatchTheRequestElement(string $class, string $wsdl): void {
    $schema = WsdlSchema::load($this->wsdl($wsdl));

    foreach (ServiceSource::operationCalls($class) as $call) {
      if (!$schema->hasOperation($call['operation'])) {
        // Reported by testEveryOperationUsedExistsInTheWsdl; nothing to compare.
        continue;
      }

      $expected = $schema->requestParameters($call['operation']);
      $actual = $call['keys'];

      sort($expected);
      sort($actual);

      $this->assertSame(
          $expected,
          $actual,
          $class . '::' . $call['method'] . '() (line ' . $call['line'] . ') does not match the '
          . $call['operation'] . ' request element in ' . $wsdl . '.wsdl.' . PHP_EOL
          . '  never sent: ' . self::describe(array_diff($expected, $actual)) . PHP_EOL
          . '  not in the schema (silently dropped on the wire): ' . self::describe(array_diff($actual, $expected))
      );
    }
  }

  /**
   * The other direction: an operation nothing wraps is an operation callers
   * can only reach through custom().
   *
   * @param class-string<BaseService> $class
   */
  #[DataProvider('services')]
  public function testEveryWsdlOperationHasAWrappingMethod(string $class, string $wsdl): void {
    $schema = WsdlSchema::load($this->wsdl($wsdl));
    $wrapped = [];

    foreach (ServiceSource::operationCalls($class) as $call) {
      $wrapped[$call['operation']] = true;
    }

    $missing = array_values(array_diff($schema->operations(), array_keys($wrapped)));

    $this->assertSame(
        [],
        $missing,
        $wsdl . '.wsdl declares ' . count($missing) . ' operation(s) that ' . $class
        . ' does not wrap: ' . implode(', ', $missing)
    );
  }

  /**
   * The endpoint path, case included. Brightree's hosts are case sensitive, so
   * a wrong capital is a 404 at runtime and nothing catches it earlier.
   *
   * @param class-string<BaseService> $class
   */
  #[DataProvider('services')]
  public function testTheServicePointsAtTheEndpointTheWsdlAdvertises(string $class, string $wsdl): void {
    $schema = WsdlSchema::load($this->wsdl($wsdl));
    $service = new $class([]);

    $advertised = $schema->addressPath();
    $configured = parse_url($service->wsdl_path, PHP_URL_PATH);

    $this->assertNotNull($advertised, $wsdl . '.wsdl has no soap:address to compare against.');
    $this->assertSame(
        $advertised,
        $configured,
        $class . '::$wsdl_path points at "' . $configured . '" but ' . $wsdl
        . '.wsdl advertises "' . $advertised . '". The comparison is case sensitive on purpose.'
    );
  }

  /**
   * @param array<int|string, string> $names
   */
  private static function describe(array $names): string {
    return $names === [] ? '(none)' : implode(', ', $names);
  }
}
