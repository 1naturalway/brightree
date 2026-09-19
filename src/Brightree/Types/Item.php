<?php

namespace Brightree\Types;

use Brightree\Enums\ItemBaseType;

/**
 * Generated from the Item type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class Item {
  public ?int $BrightreeID = null;

  public ?int $CaloriesPerItem = null;

  public ?ItemClaimNoteDefaults $ClaimNoteDefaults = null;

  public ?float $DefaultBillingMultiplier = null;

  public ?ItemVendorInfo $DefaultDropshipVendor = null;

  public ?ItemDefaultPricing $DefaultPricing = null;

  public ?ItemVendorInfo $DefaultVendor = null;

  public ?ItemDeprecationDefaults $DeprecationDefaults = null;

  public ?string $ExternalID = null;

  public ?ItemGeneralInfo $GeneralInfo = null;

  public ?ItemBaseType $ItemBaseTypeKey = null;

  public ?ItemManufacturer $Manufacturer = null;

  public ?MultipleUnitsBaseItem $MultipleUnitsBaseItem = null;

  public ?NDCInfo $NDCInfo = null;

  /** @var StandardProcCodeInfo[] */
  public array $StandardProcCodes = [];

  public ?StockingUOM $StockingUOM = null;

  public ?ItemRef $SupersededItem = null;

  public ?ItemUPN $UPN = null;
}
