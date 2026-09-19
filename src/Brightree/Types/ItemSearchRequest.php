<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the ItemSearchRequest type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemSearchRequest {
  public ?int $BrightreeID = null;

  public ?ItemVendorInfo $DefaultDropshipVendor = null;

  public ?LookupValue $DepreciationType = null;

  public ?string $ExternalID = null;

  public ?LookupValue $GLAcctGrp = null;

  public ?LookupValue $ItemGroup = null;

  public ?string $ItemID = null;

  public ?string $ItemName = null;

  public ?LookupValue $ItemType = null;

  public ?bool $KitItem = null;

  public ?bool $Lotted = null;

  public ?LookupValue $Manufacturer = null;

  public ?string $ManufacturerItemId = null;

  public ?LookupValue $ProcCode = null;

  public ?LookupValue $SaleType = null;

  public ?LookupValue $Status = null;

  public ?bool $SupplyAllowance = null;

  public ?string $UPCBarCode = null;

  public ?string $User1 = null;

  public ?string $User2 = null;

  public ?string $User3 = null;

  public ?string $User4 = null;

  public ?LookupValue $Vendor = null;

  public ?string $VendorItemID = null;

  public ?string $VendorItemName = null;
}
