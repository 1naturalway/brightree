<?php

namespace Brightree\Types;

use Brightree\Enums\Inventory\ItemType;
use Brightree\Enums\SalesType;

/**
 * Generated from the ItemGeneralInfo type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemGeneralInfo {
  public ?bool $AutoReorder = null;

  public ?CoverageType $CoverageType = null;

  public ?bool $ExcludeFromPurchaseOrder = null;

  public ?bool $ExcludeFromSalesOrder = null;

  public ?bool $ExcludeFromStandardPricing = null;

  public ?GLAccountGroup $GeneralLedgerGroup = null;

  public ?string $ItemDescription = null;

  public ?ItemGroup $ItemGroup = null;

  public ?string $ItemID = null;

  public ?string $ItemName = null;

  public ?ItemStatus $ItemStatus = null;

  public ?ItemType $ItemType = null;

  public ?bool $KitItem = null;

  public ?KitType $KitType = null;

  public ?bool $Lotted = null;

  public ?bool $PODSiteSetting = null;

  public ?SalesType $SaleType = null;

  public ?string $ServiceCat = null;

  public ?bool $SupplyAllowance = null;

  public ?string $User1 = null;

  public ?string $User2 = null;

  public ?string $User3 = null;

  public ?string $User4 = null;

  public ?float $Weight = null;
}
