<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the VendorItem type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class VendorItem {
  public ?int $BrightreeID = null;

  public ?bool $DefaultVendor = null;

  public ?string $ManufacturerBarCode = null;

  public ?int $OrderingUOMKey = null;

  public ?float $UnitPrice = null;

  public ?LookupValue $Vendor = null;

  public ?string $VendorItemID = null;

  public ?string $VendorItemName = null;
}
