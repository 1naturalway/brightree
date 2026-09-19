<?php

namespace Brightree\Enums;

/**
 * Generated from the ItemBaseType type in InventoryService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ItemBaseType: string {
  case DME = 'DME';
  case Drug = 'Drug';
}
