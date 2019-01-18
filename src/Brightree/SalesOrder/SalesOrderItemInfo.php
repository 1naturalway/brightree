<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\ICDCodeInfo;

class SalesOrderItemInfo {
  public $AcceptAssignment;
  public $AddMod1;
  public $AddMod2;
  public $AddMod3;
  public $AddMod4;
  public $AllowAmt;
  public $BillyQty;
  public $BrightreeDetailID;
  public $CancelledQty;
  public $ChargeAmt;
  public $ClaimNote;
  public $ClaimNoteType;
  public $DelCoPayAmt;
  public $DelTaxAmt;
  public $DiagnosisCodes;
  public $DOSToDt;
  public $ExtAllowAmt;
  public $ExtChargeAmt;
  public $ExternalID;
  public $ItemDescription;
  public $ItemGroup;
  public $ItemID;
  public $ItemName;
  public $LotNumberInfo;
  public $LotNumbers;
  public $NextDOSDt;
  public $Modifer1;
  public $Modifer2;
  public $Modifer3;
  public $Modifer4;
  public $NonTaxReason;
  public $Note;
  public $Opt;
  public $OverrideTaxRate;
  public $PayorInfo;
  public $PickedUpQuantity;
  public $PriceOption;
  public $ProcCode;
  public $PurchaseOrderBrightreeID;
  public $PurchaseOrderID;
  public $Quantity;
  public $ReceivedQty;
  public $ResponsibilityAmt;
  public $SalesType;
  public $SerialNumberInfo;
  public $SerialNumbers;
  public $ServiceDt;
  public $ShippedQuantity;
  public $SpecialPricing;
  public $Taxable;
  public $TaxZone;

  public function __construct() {
    $this->ClaimNoteType = new LookupValue;
    $this->DiagnosisCodes = new ICDCodeInfo;
    $this->ItemGroup = new LookupValue;
    $this->LotNumberInfo = array();
    $this->LotNumbers = array();
    $this->NonTaxReason = new LookupValue;
    $this->PayorInfo = new SalesOrderItemPayorInfo;
    $this->SerialNumberInfo = array();
    $this->SerialNumbers = array();
  }
}
