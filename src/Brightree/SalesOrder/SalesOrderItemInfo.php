<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\ICDCodeInfo;
use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\PriceOverride;
use Brightree\Enums\SalesOrder\ItemType;
use Brightree\Enums\SalesOrder\PriceType;

class SalesOrderItemInfo {
  public ?bool $AcceptAssignment = null;

  public ?string $AddMod1 = null;

  public ?string $AddMod2 = null;

  public ?string $AddMod3 = null;

  public ?string $AddMod4 = null;

  public ?float $AllowAmt = null;

  public ?int $BillQty = null;

  public ?int $BrightreeDetailID = null;

  public ?int $CancelledQty = null;

  public ?float $ChargeAmt = null;

  public ?string $ClaimNote = null;

  public ?int $ClaimNoteTypeKey = null;

  public LookupValue $DefaultManufacturer;

  public ?float $DelCoPayAmt = null;

  public ?float $DelTaxAmt = null;

  /** @var ICDCodeInfo[] */
  public array $DiagnosisCodes = [];

  public ?string $DOSToDt = null;

  public ?float $ExtAllowAmt = null;

  public ?float $ExtChargeAmt = null;

  public ?string $ExternalID = null;

  public LookupValue $InventoryLocation;

  public ?string $ItemDescription = null;

  public LookupValue $ItemGroup;

  public ?string $ItemID = null;

  public ?string $ItemName = null;

  /** @var LotNumberInfo[] */
  public array $LotNumbers = [];

  public ?string $NextDOSDt = null;

  public ?string $Modifier1 = null;

  public ?string $Modifier2 = null;

  public ?string $Modifier3 = null;

  public ?string $Modifier4 = null;

  public LookupValue $NonTaxReason;

  public ?string $Note = null;

  public ?int $Opt = null;

  public ?float $OverrideTaxRate = null;

  /** @var SalesOrderItemPayorInfo[] */
  public array $Payors = [];

  public ?int $PickupAvailableQuantity = null;

  public ?LookupValue $PriceOption = null;

  public ?string $ProcCode = null;

  public ?int $PurchaseOrderBrightreeID = null;

  public ?int $PurchaseOrderID = null;

  public ?int $Qty = null;

  public ?int $ReceivedQty = null;

  public ?float $ResponsibilityAmt = null;

  public PriceType|string|null $SaleType = null;

  /** @var SerialNumberInfo[] */
  public array $SerialNumbers = [];

  public ?string $ServiceDt = null;

  public ?int $ShippedQty = null;

  public ?bool $SpecialPricing = null;

  public ?bool $Taxable = null;

  public LookupValue $StockingUOM;

  public ?LookupValue $TaxZone = null;

  public ?bool $ABN = null;

  public ?float $ABNAllowAmt = null;

  public ?float $ABNChargeAmt = null;

  public ?string $ABNItemName = null;

  public ?string $ABNModifier1 = null;

  public ?string $ABNModifier2 = null;

  public ?string $ABNReason = null;

  public ?bool $ABNUpgrade = null;

  public ?string $ABNUpgradeItemID = null;

  public ?string $ABNUpgradeItemName = null;

  public ?string $ABNUpgradeItemProcCode = null;

  public ?bool $BasicItemSerialNumberCollection = null;

  public ?float $CTPAllowAmt = null;

  public ?float $CTPChargeAmt = null;

  public ?string $CTPModifier1 = null;

  public ?string $CTPModifier2 = null;

  public ?string $CTPModifier3 = null;

  public ?string $CTPModifier4 = null;

  public ?int $CTPPeriod = null;

  public ItemType|string|null $ItemType = null;

  public ?bool $Kit = null;

  public ?bool $Lotted = null;

  public ?string $ManfBarCode = null;

  public ?string $ManfItemId = null;

  public ?bool $ManualConvertToPurchase = null;

  public ?string $NextBillingDate = null;

  public ?int $NextBillingPeriod = null;

  public ?bool $PARRequiredNotSpecified = null;

  public ?string $PatientExhaustDate = null;

  public PriceOverride|string|null $PriceOverride = null;

  public function __construct() {
    $this->DefaultManufacturer = new LookupValue();
    $this->InventoryLocation = new LookupValue();
    $this->ItemGroup = new LookupValue();
    $this->NonTaxReason = new LookupValue();
    $this->StockingUOM = new LookupValue();
  }

  public function addDiagnosisCode(ICDCodeInfo $diagnosisCode): self {
    $this->DiagnosisCodes[] = $diagnosisCode;
    return $this;
  }

  public function addLotNumber(LotNumberInfo $lotNumber): self {
    $this->LotNumbers[] = $lotNumber;
    return $this;
  }

  public function addPayor(SalesOrderItemPayorInfo $payor): self {
    $this->Payors[] = $payor;
    return $this;
  }

  public function addSerialNumber(SerialNumberInfo $serialNumber): self {
    $this->SerialNumbers[] = $serialNumber;
    return $this;
  }
}
