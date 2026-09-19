<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the ItemVendorInfo type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemVendorInfo {
  public ?string $ItemID = null;

  public ?string $ItemName = null;

  public ?LookupValue $Vendor = null;
}
