<?php

namespace Brightree\Tests\Support;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use RuntimeException;

/**
 * Just enough WSDL reading to answer "what does this service actually accept?".
 *
 * Every lookup is namespace-aware. A Brightree singleWsdl inlines a dozen
 * schemas and the same local name is frequently declared in more than one of
 * them, so anything resolved on local name alone lands on the wrong
 * declaration and the resulting failure message is nonsense.
 */
final class WsdlSchema {
  private const WSDL_NS = 'http://schemas.xmlsoap.org/wsdl/';

  private const SOAP_NS = 'http://schemas.xmlsoap.org/wsdl/soap/';

  private const XSD_NS = 'http://www.w3.org/2001/XMLSchema';

  private DOMXPath $xpath;

  /** @var array<string, DOMElement> Global xs:element, keyed {namespace}Local. */
  private array $elements = [];

  /** @var array<string, DOMElement> Global xs:complexType, keyed {namespace}Local. */
  private array $complexTypes = [];

  /** @var array<string, array<int, DOMElement>> Global xs:complexType, keyed by local name only. */
  private array $complexTypesByLocalName = [];

  private function __construct(private readonly string $path, DOMDocument $document) {
    $this->xpath = new DOMXPath($document);
    $this->xpath->registerNamespace('wsdl', self::WSDL_NS);
    $this->xpath->registerNamespace('soap', self::SOAP_NS);
    $this->xpath->registerNamespace('xs', self::XSD_NS);

    foreach ($this->query('/wsdl:definitions/wsdl:types/xs:schema') as $schema) {
      $namespace = $schema->getAttribute('targetNamespace');

      foreach ($this->query('./xs:element[@name]', $schema) as $element) {
        $this->elements['{' . $namespace . '}' . $element->getAttribute('name')] = $element;
      }

      foreach ($this->query('./xs:complexType[@name]', $schema) as $type) {
        $name = $type->getAttribute('name');
        $this->complexTypes['{' . $namespace . '}' . $name] = $type;
        $this->complexTypesByLocalName[$name][] = $type;
      }
    }
  }

  public static function load(string $path): self {
    $document = new DOMDocument();
    $document->preserveWhiteSpace = false;

    if (!$document->load($path, LIBXML_NONET)) {
      throw new RuntimeException('Could not parse ' . $path . ' as XML.');
    }

    return new self($path, $document);
  }

  public function path(): string {
    return $this->path;
  }

  /**
   * Every operation the service exposes, taken from the portTypes rather than
   * from any list this repository keeps.
   *
   * @return string[]
   */
  public function operations(): array {
    $names = [];

    foreach ($this->query('/wsdl:definitions/wsdl:portType/wsdl:operation[@name]') as $operation) {
      $names[$operation->getAttribute('name')] = true;
    }

    return array_keys($names);
  }

  public function hasOperation(string $operation): bool {
    return in_array($operation, $this->operations(), true);
  }

  /**
   * Names of the child elements inside an operation's request wrapper — that
   * is, the parameter names the operation accepts, in schema order.
   *
   * @return string[]
   */
  public function requestParameters(string $operation): array {
    $element = $this->requestElement($operation);

    if ($element === null) {
      throw new RuntimeException('No request element found for operation ' . $operation . ' in ' . $this->path);
    }

    return array_keys($this->elementFields($element));
  }

  /**
   * The wrapper xs:element an operation's input message points at.
   */
  private function requestElement(string $operation): ?DOMElement {
    $nodes = $this->query(
        '/wsdl:definitions/wsdl:portType/wsdl:operation[@name=' . self::literal($operation) . ']/wsdl:input[@message]'
    );

    foreach ($nodes as $input) {
      $message = $this->messageFor($input->getAttribute('message'));

      if ($message === null) {
        continue;
      }

      foreach ($this->query('./wsdl:part[@element]', $message) as $part) {
        $element = $this->elements[$this->qualify($part->getAttribute('element'), $part)] ?? null;

        if ($element !== null) {
          return $element;
        }
      }
    }

    return null;
  }

  private function messageFor(string $qname): ?DOMElement {
    $local = self::localName($qname);

    foreach ($this->query('/wsdl:definitions/wsdl:message[@name=' . self::literal($local) . ']') as $message) {
      return $message;
    }

    return null;
  }

  /**
   * Fields of a global xs:element: either its inline complexType's children or
   * those of the named type it points at.
   *
   * @return array<string, string> Field name => the {namespace}Local of its type.
   */
  private function elementFields(DOMElement $element): array {
    foreach ($this->query('./xs:complexType', $element) as $inline) {
      return $this->complexTypeFields($inline);
    }

    if ($element->hasAttribute('type')) {
      $type = $this->complexTypes[$this->qualify($element->getAttribute('type'), $element)] ?? null;

      if ($type !== null) {
        return $this->complexTypeFields($type);
      }
    }

    return [];
  }

  /**
   * Every field a complexType carries, with any xs:extension base chain
   * flattened in. Base fields come first, as they do on the wire.
   *
   * @return array<string, string>
   */
  public function complexTypeFields(DOMElement $type): array {
    $fields = [];

    foreach ($this->query('./xs:complexContent/xs:extension[@base]', $type) as $extension) {
      $base = $this->complexTypes[$this->qualify($extension->getAttribute('base'), $extension)] ?? null;

      if ($base !== null && $base !== $type) {
        $fields = $this->complexTypeFields($base);
      }

      $fields += $this->particleFields($extension);
    }

    foreach ($this->query('./xs:simpleContent/xs:extension[@base]', $type) as $extension) {
      $fields += $this->particleFields($extension);
    }

    return $fields + $this->particleFields($type);
  }

  /**
   * Child element and attribute names declared directly under a complexType or
   * an extension, including through a sequence, all or choice particle.
   *
   * @return array<string, string>
   */
  private function particleFields(DOMElement $node): array {
    $fields = [];
    $paths = [
      './xs:sequence/xs:element[@name]',
      './xs:all/xs:element[@name]',
      './xs:choice/xs:element[@name]',
      './xs:sequence/xs:choice/xs:element[@name]',
      './xs:attribute[@name]',
    ];

    foreach ($paths as $path) {
      foreach ($this->query($path, $node) as $field) {
        $type = $field->hasAttribute('type') ? $this->qualify($field->getAttribute('type'), $field) : '{inline}';
        $fields[$field->getAttribute('name')] = $type;
      }
    }

    return $fields;
  }

  /**
   * Fields of every global complexType with this local name, merged. Brightree
   * repeats a name across schemas, and the declarations agree in practice, so
   * the union is what a DTO has to satisfy.
   *
   * @return string[]|null Null when no such type exists in this WSDL.
   */
  public function fieldsOfType(string $localName): ?array {
    if (!isset($this->complexTypesByLocalName[$localName])) {
      return null;
    }

    $fields = [];

    foreach ($this->complexTypesByLocalName[$localName] as $type) {
      $fields += $this->complexTypeFields($type);
    }

    return array_keys($fields);
  }

  /**
   * The path component of the endpoint the WSDL advertises, which is what a
   * service's wsdl_path has to point at.
   */
  public function addressPath(): ?string {
    foreach ($this->query('/wsdl:definitions/wsdl:service/wsdl:port/soap:address[@location]') as $address) {
      return parse_url($address->getAttribute('location'), PHP_URL_PATH) ?: null;
    }

    return null;
  }

  /**
   * Expand a QName against the namespaces in scope at $context, so a prefix
   * that means one schema here and another there cannot be confused.
   */
  private function qualify(string $qname, DOMNode $context): string {
    $colon = strpos($qname, ':');
    $prefix = $colon === false ? null : substr($qname, 0, $colon);
    $local = $colon === false ? $qname : substr($qname, $colon + 1);

    return '{' . ($context->lookupNamespaceURI($prefix) ?? '') . '}' . $local;
  }

  private static function localName(string $qname): string {
    $colon = strpos($qname, ':');

    return $colon === false ? $qname : substr($qname, $colon + 1);
  }

  /**
   * @return DOMElement[]
   */
  private function query(string $expression, ?DOMNode $context = null): array {
    $nodes = $this->xpath->query($expression, $context);
    $elements = [];

    if ($nodes === false) {
      return $elements;
    }

    foreach ($nodes as $node) {
      if ($node instanceof DOMElement) {
        $elements[] = $node;
      }
    }

    return $elements;
  }

  /**
   * XPath has no escape syntax, so a value containing a quote has to be built
   * with concat(). Operation names never do, but the helper stays honest.
   */
  private static function literal(string $value): string {
    if (!str_contains($value, "'")) {
      return "'" . $value . "'";
    }

    return 'concat(' . implode(", \"'\", ", array_map(static fn(string $p): string => "'" . $p . "'", explode("'", $value))) . ')';
  }
}
