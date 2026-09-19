<?php

namespace Brightree\Enums\Inventory;

/**
 * Generated from the Severity type in InventoryService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum Severity: string {
  case Low = 'Low';
  case Medium = 'Medium';
  case High = 'High';
  case Critical = 'Critical';
}
