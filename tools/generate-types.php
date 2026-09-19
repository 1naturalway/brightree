<?php

/**
 * Regenerates the WSDL-derived DTOs in src/Brightree/Types and the enums in
 * src/Brightree/Enums from a local copy of Brightree's WSDLs. Those are not in
 * this repository (see wsdlDir() below), so the generated output is committed
 * and only needs regenerating when Brightree ships a new service version.
 *
 * Only types reachable from a wrapped operation's *input* parameters are
 * generated — response payloads come back as stdClass, so classes for them
 * would never be used. Hand-written classes under the other Brightree
 * namespaces take precedence, but only when they actually match the schema:
 * adopting one by name alone is how a class silently ends up missing fields
 * the service needs.
 *
 * Usage:  php tools/generate-types.php [--dry-run]
 */

declare(strict_types=1);

/**
 * Brightree's WSDLs are their proprietary material and are not committed, so
 * this has to be resolved at runtime. Set BRIGHTREE_WSDL_DIR to a local copy,
 * or drop one in "Brightree Services" at the project root.
 */
function wsdlDir(): string {
  $configured = getenv('BRIGHTREE_WSDL_DIR');
  $dir = $configured !== false && $configured !== ''
    ? rtrim($configured, '/')
    : __DIR__ . '/../Brightree Services';

  if (!is_dir($dir)) {
    fwrite(STDERR, "No WSDL directory at $dir.\n"
      . "Brightree's WSDLs are proprietary and are not part of this repository.\n"
      . "Put a local copy in \"Brightree Services\" at the project root, or set\n"
      . "BRIGHTREE_WSDL_DIR to wherever you keep it, then run this again.\n");
    exit(1);
  }

  return $dir;
}

const SRC_DIR   = __DIR__ . '/../src/Brightree';
const TYPES_NS  = 'Brightree\\Types';
const ENUMS_NS  = 'Brightree\\Enums';

const XSD_SCALARS = [
  'string' => '?string', 'normalizedString' => '?string', 'token' => '?string',
  'anyURI' => '?string', 'QName' => '?string', 'duration' => '?string',
  'dateTime' => '?string', 'date' => '?string', 'time' => '?string',
  'base64Binary' => '?string', 'hexBinary' => '?string', 'guid' => '?string',
  'char' => '?string', 'anyType' => 'mixed',
  'int' => '?int', 'integer' => '?int', 'long' => '?int', 'short' => '?int',
  'byte' => '?int', 'unsignedInt' => '?int', 'unsignedLong' => '?int',
  'unsignedShort' => '?int', 'unsignedByte' => '?int', 'nonNegativeInteger' => '?int',
  'positiveInteger' => '?int',
  'decimal' => '?float', 'double' => '?float', 'float' => '?float',
  'boolean' => '?bool',
];

/** Service name -> the sub-namespace used when a type name collides. */
const SERVICE_SUBNS = [
  'InventoryService' => 'Inventory', 'SalesOrderService' => 'SalesOrder',
  'PickupExchangeService' => 'PickupExchange', 'InvoiceService' => 'Invoice',
  'PricingService' => 'Pricing', 'InsuranceService' => 'Insurance',
  'patientservice' => 'Patient', 'DoctorService' => 'Doctor',
  'ReferenceDataService' => 'ReferenceData', 'UserSecurityService' => 'Security',
  'DocumentManagementService' => 'Documentation', 'CustomFieldService' => 'CustomField',
];

/**
 * Types the generator must not emit because a hand-written class owns them.
 * Keyed by "Service::TypeName", valued with the FQCN to reference instead.
 */
const HAND_WRITTEN_OVERRIDES = [
  'SalesOrderService::SerialNumberInfo' => 'Brightree\\SalesOrder\\SerialNumberInfo',
  // DoctorService's Facility is the shape ApiMessageServices\Facility already
  // models; ReferenceDataService declares a different, larger one, which is why
  // the name has to be split per service at all.
  'DoctorService::Facility' => 'Brightree\\ApiMessageServices\\Facility',
];

/**
 * Types to emit even though no operation input reaches them, because a
 * hand-written class has a property of that type. Keyed by "Service::Type".
 */
const EXTRA_TYPES = [
  'DocumentManagementService::DocumentReviewModeType' => true,
];

// ---------------------------------------------------------------- WSDL parsing

function loadService(string $path): array {
  $dom = new DOMDocument();
  $dom->load($path);
  $xp = new DOMXPath($dom);
  $xp->registerNamespace('wsdl', 'http://schemas.xmlsoap.org/wsdl/');
  $xp->registerNamespace('xs', 'http://www.w3.org/2001/XMLSchema');

  $elements = [];
  $types = [];
  foreach ($xp->query('//xs:schema') as $schema) {
    $tns = $schema->getAttribute('targetNamespace');
    foreach ($xp->query('./xs:element', $schema) as $el) {
      $elements["{$tns}}" . $el->getAttribute('name')] = $el;
    }
    foreach ($xp->query('./xs:complexType | ./xs:simpleType', $schema) as $t) {
      // Keyed by {namespace}LocalName. Brightree reuses local names across
      // schemas in the same WSDL — patientservice declares two PatientNote
      // types, a 22-field one and a 1-field stub — so a local-name-only index
      // silently resolves to whichever came last in document order.
      $types["{$tns}}" . $t->getAttribute('name')] = $t;
    }
  }

  return [$xp, $elements, $types];
}

/** Expand a prefixed schema reference into a {namespace}LocalName key. */
function qname(DOMElement $ctx, string $raw): string {
  if ($raw === '') {
    return '';
  }

  if (!str_contains($raw, ':')) {
    return ($ctx->lookupNamespaceURI(null) ?? '') . '}' . $raw;
  }

  [$prefix, $local] = explode(':', $raw, 2);

  return ($ctx->lookupNamespaceURI($prefix) ?? '') . '}' . $local;
}

/** The local part of a {namespace}LocalName key. */
function localName(string $qname): string {
  $at = strrpos($qname, '}');

  return $at === false ? $qname : substr($qname, $at + 1);
}

/** Whether a {namespace}LocalName key names a built-in XSD scalar. */
function scalarHint(string $qname): ?string {
  if (!str_starts_with($qname, 'http://www.w3.org/2001/XMLSchema}')) {
    return null;
  }

  return XSD_SCALARS[localName($qname)] ?? 'mixed';
}

/** Ordered child elements of a complexType, following xs:sequence/xs:all. */
function particles(DOMXPath $xp, DOMElement $node): array {
  $out = [];
  foreach ($xp->query('.//xs:sequence/xs:element | .//xs:all/xs:element', $node) as $e) {
    if ($e->hasAttribute('ref')) {
      continue;
    }
    $out[] = [
      'name' => $e->getAttribute('name'),
      'type' => $e->hasAttribute('type') ? qname($e, $e->getAttribute('type')) : '(inline)',
      'list' => $e->getAttribute('maxOccurs') === 'unbounded',
    ];
  }
  return $out;
}

function describe(DOMXPath $xp, DOMElement $node): array {
  if ($node->localName === 'simpleType') {
    $values = [];
    foreach ($xp->query('.//xs:enumeration', $node) as $e) {
      $values[] = $e->getAttribute('value');
    }
    return ['kind' => 'enum', 'values' => $values];
  }

  $base = null;
  foreach ($xp->query('./xs:complexContent/xs:extension', $node) as $ext) {
    $base = qname($ext, $ext->getAttribute('base'));
  }

  return ['kind' => 'complex', 'base' => $base, 'fields' => particles($xp, $node)];
}

// ------------------------------------------------------------- reachability

function closure(DOMXPath $xp, array $elements, array $types): array {
  $msgs = [];
  foreach ($xp->query('//wsdl:message') as $m) {
    $parts = [];
    foreach ($xp->query('./wsdl:part', $m) as $p) {
      if ($p->hasAttribute('element')) {
        $parts[] = qname($p, $p->getAttribute('element'));
      }
    }
    $msgs[$m->getAttribute('name')] = $parts;
  }

  $queue = [];
  foreach ($xp->query('//wsdl:portType/wsdl:operation/wsdl:input') as $in) {
    [, $local] = explode(':', $in->getAttribute('message'), 2);
    foreach ($msgs[$local] ?? [] as $elKey) {
      if (!isset($elements[$elKey])) {
        continue;
      }
      foreach ($xp->query('./xs:complexType', $elements[$elKey]) as $ct) {
        foreach (particles($xp, $ct) as $f) {
          $queue[] = $f['type'];
        }
      }
    }
  }

  $seen = [];
  while ($queue) {
    $t = array_shift($queue);

    // A collection wrapper is modelled as a PHP array, so follow through to
    // the item type instead of generating a class for the wrapper.
    $item = arrayItemType($xp, $types, $t);
    if ($item !== null) {
      $queue[] = $item;
      continue;
    }

    if (isset($seen[$t]) || scalarHint($t) !== null || !isset($types[$t])) {
      continue;
    }

    $described = describe($xp, $types[$t]);
    $seen[$t] = $described;
    if ($described['kind'] === 'enum') {
      continue;
    }
    if ($described['base']) {
      $queue[] = $described['base'];
    }
    foreach ($described['fields'] as $f) {
      $queue[] = $f['type'];
    }
  }

  return $seen;
}

/**
 * If the type names a collection wrapper (ArrayOfFoo, or any complexType whose
 * sole child repeats), return the {namespace}LocalName of the item type.
 *
 * Resolved through the schema rather than by trimming "ArrayOf" off the name,
 * because the item type often lives in a different namespace than the wrapper.
 */
function arrayItemType(DOMXPath $xp, array $types, string $qname): ?string {
  if (!isset($types[$qname]) || !str_starts_with(localName($qname), 'ArrayOf')) {
    return null;
  }

  $children = particles($xp, $types[$qname]);

  return count($children) === 1 && $children[0]['list'] ? $children[0]['type'] : null;
}

// ------------------------------------------------------------------ emitting

function phpDoc(string $wsdlName, string $service, ?string $extra = null): string {
  $lines = [
    '/**',
    " * Generated from the $wsdlName type in $service.wsdl.",
  ];
  if ($extra !== null) {
    $lines[] = ' *';
    $lines[] = " * $extra";
  }
  $lines[] = ' *';
  $lines[] = ' * Regenerate with: php tools/generate-types.php';
  $lines[] = ' */';
  return implode("\n", $lines);
}

function emitEnum(string $name, string $namespace, array $values, string $service): string {
  $seen = [];
  $cases = [];
  foreach ($values as $v) {
    if (isset($seen[$v])) {
      continue;
    }
    $seen[$v] = true;
    $case = preg_match('/^(self|parent|static)$/i', $v) ? $v . 'Value' : $v;
    $cases[] = "  case $case = '$v';";
  }

  return "<?php\n\nnamespace $namespace;\n\n"
    . phpDoc($name, $service, 'The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.')
    . "\nenum $name: string {\n" . implode("\n", $cases) . "\n}\n";
}

function emitClass(string $name, string $namespace, array $def, array $resolve, array $arrays, string $service): string {
  $uses = [];
  $props = [];

  $import = function (string $fqcn) use ($namespace, &$uses): string {
    $short = substr(strrchr($fqcn, '\\'), 1);
    if ($fqcn !== "$namespace\\$short") {
      $uses[$fqcn] = true;
    }
    return $short;
  };

  foreach ($def['fields'] as $f) {
    // Either the element itself repeats, or its type is a collection wrapper.
    $item = $arrays[$f['type']] ?? null;
    $isList = $f['list'] || $item !== null;
    $inner = $item ?? $f['type'];

    if ($isList) {
      $itemHint = 'mixed';
      if (isset($resolve[$inner])) {
        $itemHint = $import($resolve[$inner]);
      } elseif (($scalar = scalarHint($inner)) !== null) {
        $itemHint = ltrim($scalar, '?');
      }
      $props[] = "  /** @var {$itemHint}[] */\n  public array \${$f['name']} = [];";
      continue;
    }

    if (($scalar = scalarHint($inner)) !== null) {
      $props[] = "  public $scalar \${$f['name']} = null;";
      continue;
    }

    if (isset($resolve[$inner])) {
      // Nullable with a null default so an untouched field is pruned out of
      // the request rather than sent as an empty element.
      $props[] = '  public ?' . $import($resolve[$inner]) . " \${$f['name']} = null;";
      continue;
    }

    $props[] = "  public mixed \${$f['name']} = null;";
  }

  $extends = '';
  if ($def['base'] && isset($resolve[$def['base']])) {
    $extends = ' extends ' . $import($resolve[$def['base']]);
  }

  ksort($uses);
  $useBlock = $uses ? "\n" . implode("\n", array_map(fn($u) => "use $u;", array_keys($uses))) . "\n" : '';
  $body = $props ? "\n" . implode("\n\n", $props) . "\n" : "\n";

  return "<?php\n\nnamespace $namespace;\n$useBlock\n"
    . phpDoc($name, $service)
    . "\nclass " . $name . $extends . " {" . $body . "}\n";
}

// ------------------------------------------------------------------ pipeline

$dryRun = in_array('--dry-run', $argv, true);

$autoload = __DIR__ . '/../vendor/autoload.php';
if (is_file($autoload)) {
  require_once $autoload;
}

/** Flattened field names of a type, following its xs:extension chain. */
function flattenFields(array $found, string $qname, array $seen = []): array {
  if (!isset($found[$qname]) || isset($seen[$qname])) {
    return [];
  }
  $seen[$qname] = true;
  $def = $found[$qname];
  if ($def['kind'] !== 'complex') {
    return [];
  }
  $fields = $def['base'] ? flattenFields($found, $def['base'], $seen) : [];
  foreach ($def['fields'] as $f) {
    $fields[$f['name']] = true;
  }

  return $fields;
}

/** Public instance property names of an already-written class. */
function publicProperties(string $fqcn): ?array {
  if (!class_exists($fqcn)) {
    return null;
  }
  $names = [];
  foreach ((new ReflectionClass($fqcn))->getProperties(ReflectionProperty::IS_PUBLIC) as $p) {
    if (!$p->isStatic()) {
      $names[$p->getName()] = true;
    }
  }

  return $names;
}

/**
 * A readable suffix for the losing side of a same-local-name clash. An enum
 * competing with a complexType reads best as FooEnum; otherwise fall back to
 * the schema namespace's trailing segment.
 */
function disambiguator(string $qname, array $def, int $index): string {
  if ($def['kind'] === 'enum') {
    return 'Enum';
  }

  $ns = substr($qname, 0, strrpos($qname, '}'));
  $segment = (string) substr((string) strrchr('/' . $ns, '/'), 1);
  if (str_contains($segment, '.')) {
    $segment = (string) substr((string) strrchr($segment, '.'), 1);
  }
  $segment = preg_replace('/[^A-Za-z0-9]/', '', $segment);

  return $segment !== '' ? ucfirst($segment) : 'Alt' . $index;
}

/** Structural signature, namespace-independent, for cross-service comparison. */
function signatureOf(array $def): string {
  if ($def['kind'] === 'enum') {
    return json_encode($def['values']);
  }
  $fields = array_map(
      static fn (array $f): array => [$f['name'], localName($f['type']), $f['list']],
      $def['fields']
  );

  return json_encode([$def['base'] ? localName($def['base']) : null, $fields]);
}

// Hand-written classes are candidates for reuse, keyed by short name.
$handWritten = [];
foreach (glob(SRC_DIR . '/{ApiMessageServices,CommonServices,Patient,SalesOrder,DocumentManagement}/*.php', GLOB_BRACE) as $f) {
  $src = file_get_contents($f);
  preg_match('/^namespace\s+([^;]+);/m', $src, $ns);
  preg_match('/^(?:abstract\s+|final\s+)?class\s+(\w+)/m', $src, $c);
  if (!$ns || !$c) {
    continue;
  }
  $handWritten[$c[1]] = trim($ns[1]) . '\\' . $c[1];
}

$perService = [];
$arraysPerService = [];
foreach (glob(wsdlDir() . '/*.wsdl') as $path) {
  $service = basename($path, '.wsdl');
  [$xp, $elements, $types] = loadService($path);
  $found = closure($xp, $elements, $types);

  foreach (array_keys(EXTRA_TYPES) as $key) {
    [$forService, $wanted] = explode('::', $key, 2);
    if ($forService !== $service) {
      continue;
    }
    foreach ($types as $qname => $node) {
      if (localName($qname) === $wanted && !isset($found[$qname])) {
        $found[$qname] = describe($xp, $node);
      }
    }
  }

  // Collection wrappers: field type -> item type, resolved through the schema.
  $arrays = [];
  foreach ($types as $qname => $_) {
    $item = arrayItemType($xp, $types, $qname);
    if ($item !== null) {
      $arrays[$qname] = $item;
    }
  }

  $perService[$service] = $found;
  $arraysPerService[$service] = $arrays;
}

// A PHP short name per type. Two schemas in one WSDL can declare the same
// local name (patientservice has two PatientNote types), so disambiguate.
$shortNames = [];
foreach ($perService as $service => $found) {
  $byLocal = [];
  foreach ($found as $qname => $def) {
    $byLocal[localName($qname)][] = $qname;
  }
  foreach ($byLocal as $local => $qnames) {
    if (count($qnames) === 1) {
      $shortNames["$service::{$qnames[0]}"] = $local;
      continue;
    }
    // Keep the plain name for the richest definition; suffix the rest.
    usort($qnames, static fn ($a, $b) => count($found[$b]['fields'] ?? []) <=> count($found[$a]['fields'] ?? []));
    foreach ($qnames as $i => $qname) {
      if ($i === 0) {
        $shortNames["$service::$qname"] = $local;
        continue;
      }
      $shortNames["$service::$qname"] = $local . disambiguator($qname, $found[$qname], $i);
      fwrite(STDERR, "note: $service declares $local in two namespaces; emitting the smaller as "
        . $shortNames["$service::$qname"] . "\n");
    }
  }
}

// Split a name into per-service namespaces only when services disagree on it.
$signatures = [];
foreach ($perService as $service => $found) {
  foreach ($found as $qname => $def) {
    $signatures[$shortNames["$service::$qname"]][$service] = signatureOf($def);
  }
}
$collides = [];
foreach ($signatures as $short => $bySvc) {
  if (count(array_unique($bySvc)) > 1) {
    $collides[$short] = true;
  }
}

$plan = [];
$rejected = [];
foreach ($perService as $service => $found) {
  foreach ($found as $qname => $def) {
    $short = $shortNames["$service::$qname"];
    $key = "$service::$qname";

    if (isset(HAND_WRITTEN_OVERRIDES["$service::$short"])) {
      $plan[$key] = ['fqcn' => HAND_WRITTEN_OVERRIDES["$service::$short"], 'emit' => false];
      continue;
    }

    // Reuse a hand-written class only when it really is the same shape.
    // Matching on name alone silently adopts a class that is missing fields
    // this service needs, which is the bug this generator exists to avoid.
    if (isset($handWritten[$short]) && !isset($collides[$short]) && $def['kind'] === 'complex') {
      $phpProps = publicProperties($handWritten[$short]);
      $wsdlFields = flattenFields($found, $qname);
      if ($phpProps !== null && !array_diff_key($wsdlFields, $phpProps) && !array_diff_key($phpProps, $wsdlFields)) {
        $plan[$key] = ['fqcn' => $handWritten[$short], 'emit' => false];
        continue;
      }
      if ($phpProps !== null) {
        $rejected[] = sprintf(
            '%s: %s does not match %s (wsdl-only: %s; php-only: %s) — emitting a generated class instead',
            $service,
            $handWritten[$short],
            $short,
            implode(',', array_keys(array_diff_key($wsdlFields, $phpProps))) ?: '-',
            implode(',', array_keys(array_diff_key($phpProps, $wsdlFields))) ?: '-'
        );
      }
    }

    $root = $def['kind'] === 'enum' ? ENUMS_NS : TYPES_NS;
    $ns = isset($collides[$short]) ? $root . '\\' . SERVICE_SUBNS[$service] : $root;
    $plan[$key] = ['fqcn' => "$ns\\$short", 'emit' => true];
  }
}

$written = 0;
$skipped = 0;
foreach ($perService as $service => $found) {
  $resolve = [];
  foreach ($found as $qname => $_) {
    $resolve[$qname] = $plan["$service::$qname"]['fqcn'];
  }

  foreach ($found as $qname => $def) {
    $entry = $plan["$service::$qname"];
    if (!$entry['emit']) {
      $skipped++;
      continue;
    }

    $fqcn = $entry['fqcn'];
    $short = substr(strrchr($fqcn, '\\'), 1);
    $namespace = substr($fqcn, 0, strrpos($fqcn, '\\'));
    $relative = str_replace('\\', '/', substr($namespace, strlen('Brightree\\')));
    $file = SRC_DIR . '/' . $relative . '/' . $short . '.php';

    $code = $def['kind'] === 'enum'
      ? emitEnum($short, $namespace, $def['values'], $service)
      : emitClass($short, $namespace, $def, $resolve, $arraysPerService[$service], $service);

    if ($dryRun) {
      echo "would write $file\n";
      $written++;
      continue;
    }

    if (!is_dir(dirname($file))) {
      mkdir(dirname($file), 0o755, true);
    }
    // Same content means the same file; avoid churning mtimes on re-runs.
    if (!file_exists($file) || file_get_contents($file) !== $code) {
      file_put_contents($file, $code);
    }
    $written++;
  }
}

foreach (array_unique($rejected) as $line) {
  fwrite(STDERR, "note: $line\n");
}

printf("%s %d symbols (%d resolved to hand-written classes)\n", $dryRun ? 'Would write' : 'Wrote', $written, $skipped);
