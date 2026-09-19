<?php

namespace Brightree\Tests;

use Brightree\Services\BaseService;
use Brightree\Soap\SoapClientFactory;
use Brightree\Tests\Support\RecordingSoapClient;
use DOMDocument;
use DOMXPath;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use SoapClient;

/**
 * Shared base for the suite.
 *
 * Two jobs. First, it owns the SoapClientFactory seam so no test can leak a
 * stubbed factory into the next one. Second, it resolves Brightree's WSDLs,
 * which are proprietary and deliberately absent from this repository: every
 * test that needs one asks for it through wsdl() and is skipped — not failed —
 * when the file is not there.
 */
abstract class TestCase extends PHPUnitTestCase {
  /**
   * Where the WSDLs live when someone has a licensed copy. The environment
   * variable wins so the copy can sit outside the working tree.
   */
  public const WSDL_DIR_ENV = 'BRIGHTREE_WSDL_DIR';

  protected function tearDown(): void {
    // Whatever a test installed, the next one starts from the real factory.
    SoapClientFactory::using(null);

    parent::tearDown();
  }

  public static function projectRoot(): string {
    return dirname(__DIR__);
  }

  /**
   * Directory the Brightree WSDLs are read from. It need not exist.
   */
  public static function wsdlDirectory(): string {
    $configured = getenv(self::WSDL_DIR_ENV);

    if (is_string($configured) && trim($configured) !== '') {
      return rtrim(trim($configured), DIRECTORY_SEPARATOR);
    }

    return self::projectRoot() . DIRECTORY_SEPARATOR . 'Brightree Services';
  }

  /**
   * Absolute path to one Brightree WSDL, given its basename without the
   * extension. Skips the current test when the file is not available.
   */
  protected function wsdl(string $basename): string {
    $path = self::wsdlDirectory() . DIRECTORY_SEPARATOR . $basename . '.wsdl';

    if (!is_file($path)) {
      $this->markTestSkipped(
          $basename . '.wsdl not available. Brightree\'s WSDLs are proprietary and not in this repo; '
          . 'set ' . self::WSDL_DIR_ENV . ' to a local copy to run this test.'
      );
    }

    return $path;
  }

  /**
   * Every Brightree WSDL that is present, keyed by basename.
   *
   * @return array<string, string>
   */
  protected function availableWsdls(): array {
    $paths = glob(self::wsdlDirectory() . DIRECTORY_SEPARATOR . '*.wsdl') ?: [];
    $found = [];

    foreach ($paths as $path) {
      $found[basename($path, '.wsdl')] = $path;
    }

    if ($found === []) {
      $this->markTestSkipped(
          'No Brightree WSDLs available. Brightree\'s WSDLs are proprietary and not in this repo; '
          . 'set ' . self::WSDL_DIR_ENV . ' to a local copy to run this test.'
      );
    }

    return $found;
  }

  /**
   * Path to a fixture WSDL authored for this suite. These are generic and
   * carry nothing from Brightree, so they are always present.
   */
  protected function fixtureWsdl(string $basename): string {
    return __DIR__ . DIRECTORY_SEPARATOR . 'Fixtures' . DIRECTORY_SEPARATOR . $basename . '.wsdl';
  }

  /**
   * Run an operation against a real ext-soap encoder and return the request
   * XML it produced. Nothing is sent: RecordingSoapClient stops at
   * __doRequest().
   *
   * @param callable(BaseService): mixed $invoke
   */
  protected function capture(BaseService $service, callable $invoke): string {
    $client = new RecordingSoapClient($service->wsdl_path, $service->params + [
      // Keeps the parsed WSDL out of the on-disk cache, so a run leaves
      // nothing behind and never reads a stale copy.
      'cache_wsdl' => WSDL_CACHE_MEMORY,
    ]);

    SoapClientFactory::using(static fn(string $wsdl, array $options): SoapClient => $client);

    try {
      $invoke($service);
    } finally {
      SoapClientFactory::using(null);
    }

    return $client->lastRequest();
  }

  /**
   * An XPath handle over a captured request, namespace-agnostic by design:
   * assertions use getElementsByTagNameNS('*', ...) or local-name().
   */
  protected function xpath(string $xml): DOMXPath {
    $document = new DOMDocument();
    $this->assertTrue($document->loadXML($xml), 'The captured request is not well-formed XML.');

    return new DOMXPath($document);
  }

  protected function document(string $xml): DOMDocument {
    $document = new DOMDocument();
    $this->assertTrue($document->loadXML($xml), 'The captured request is not well-formed XML.');

    return $document;
  }

  /**
   * Text content of every element with the given local name, in document
   * order, ignoring namespaces.
   *
   * @return string[]
   */
  protected function textContentsOf(string $xml, string $localName): array {
    $values = [];

    foreach ($this->document($xml)->getElementsByTagNameNS('*', $localName) as $element) {
      $values[] = $element->textContent;
    }

    return $values;
  }

  protected function elementCount(string $xml, string $localName): int {
    return $this->document($xml)->getElementsByTagNameNS('*', $localName)->length;
  }
}
