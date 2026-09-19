<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\SalesOrderStatus;
use Brightree\Enums\SalesOrderTemplateStatus;

class SalesOrderGeneralInfo {
  public LookupValue $Branch;

  public ?string $ClaimNote = null;

  public ?int $ClaimNoteTypeKey = null;

  public ?string $DateOfAdmission = null;

  public ?string $DateOfDischarge = null;

  public ?float $DiscountPercent = null;

  public ?bool $ExcludeEligibilityCheck = null;

  public LookupValue $InventoryLocation;

  public ?bool $ManualHold = null;

  public ?LookupValue $ManualHoldReason = null;

  public LookupValue $PlaceOfService;

  public ?string $PONumber = null;

  public ?string $PrintDate = null;

  public ?bool $Printed = null;

  public SalesOrderClassification $SalesOrderClassification;

  public SalesOrderStatus|string|null $Status = null;

  public ?string $StopDate = null;

  public ?string $Reference = null;

  public SalesOrderTemplateStatus|string|null $TemplateStatus = null;

  public ?string $User1 = null;

  public ?string $User2 = null;

  public ?string $User3 = null;

  public ?string $User4 = null;

  public ?string $WIPAssignedTo = null;

  public ?string $WIPState = null;

  public ?string $DefaultPriceOptNm = null;

  public ?bool $IsPharmacy = null;

  public ?int $MonthSupply = null;

  public ?int $SOShippingMethodKey = null;

  public ?string $SOShippingMethodName = null;

  public ?int $SOTemplateID = null;

  public function __construct() {
    $this->Branch = new LookupValue();
    $this->InventoryLocation = new LookupValue();
    $this->PlaceOfService = new LookupValue();
    $this->SalesOrderClassification = new SalesOrderClassification();
  }

  public function getBranch(LookupValue $branch): void {
    $this->Branch = $branch;
  }

  public function getInventoryLocation(LookupValue $location): void {
    $this->InventoryLocation = $location;
  }

  public function getPlaceOfService(LookupValue $pos): void {
    $this->PlaceOfService = $pos;
  }

  public function setClaimNote(?string $ClaimNote): self {
    $this->ClaimNote = $ClaimNote;
    return $this;
  }

  public function setClaimNoteTypeKey(?int $ClaimNoteTypeKey): self {
    $this->ClaimNoteTypeKey = $ClaimNoteTypeKey;
    return $this;
  }

  public function setDateOfAdmission(?string $DateOfAdmission): self {
    $this->DateOfAdmission = $DateOfAdmission;
    return $this;
  }

  public function setDateOfDischarge(?string $DateOfDischarge): self {
    $this->DateOfDischarge = $DateOfDischarge;
    return $this;
  }

  public function setDiscountPercent(?float $DiscountPercent): self {
    $this->DiscountPercent = $DiscountPercent;
    return $this;
  }

  public function setExcludeEligibilityCheck(?bool $ExcludeEligibilityCheck): self {
    $this->ExcludeEligibilityCheck = $ExcludeEligibilityCheck;
    return $this;
  }

  public function setManualHold(?bool $ManualHold): self {
    $this->ManualHold = $ManualHold;
    return $this;
  }

  public function setManualHoldReason(?LookupValue $ManualHoldReason): self {
    $this->ManualHoldReason = $ManualHoldReason;
    return $this;
  }

  public function setPONumber(?string $PONumber): self {
    $this->PONumber = $PONumber;
    return $this;
  }

  public function setPrintDate(?string $PrintDate): self {
    $this->PrintDate = $PrintDate;
    return $this;
  }

  public function setPrinted(?bool $Printed): self {
    $this->Printed = $Printed;
    return $this;
  }

  public function setSalesOrderClassification(SalesOrderClassification $SalesOrderClassification): self {
    $this->SalesOrderClassification = $SalesOrderClassification;
    return $this;
  }

  public function setStatus(SalesOrderStatus|string|null $Status): self {
    $this->Status = $Status;
    return $this;
  }

  public function setStopDate(?string $StopDate): self {
    $this->StopDate = $StopDate;
    return $this;
  }

  public function setReference(?string $Reference): self {
    $this->Reference = $Reference;
    return $this;
  }

  public function setTemplateStatus(SalesOrderTemplateStatus|string|null $TemplateStatus): self {
    $this->TemplateStatus = $TemplateStatus;

    return $this;
  }

  public function setUser1(?string $User1): self {
    $this->User1 = $User1;

    return $this;
  }

  public function setUser2(?string $User2): self {
    $this->User2 = $User2;
    return $this;
  }

  public function setUser3(?string $User3): self {
    $this->User3 = $User3;
    return $this;
  }

  public function setUser4(?string $User4): self {
    $this->User4 = $User4;

    return $this;
  }

  public function setWIPAssignedTo(?string $WIPAssignedTo): self {
    $this->WIPAssignedTo = $WIPAssignedTo;
    return $this;
  }

  public function setWIPState(?string $WIPState): self {
    $this->WIPState = $WIPState;
    return $this;
  }

  public function setDefaultPriceOptNm(?string $DefaultPriceOptNm): self {
    $this->DefaultPriceOptNm = $DefaultPriceOptNm;
    return $this;
  }

  public function setIsPharmacy(?bool $IsPharmacy): self {
    $this->IsPharmacy = $IsPharmacy;
    return $this;
  }

  public function setMonthSupply(?int $MonthSupply): self {
    $this->MonthSupply = $MonthSupply;
    return $this;
  }

  public function setSOShippingMethodKey(?int $SOShippingMethodKey): self {
    $this->SOShippingMethodKey = $SOShippingMethodKey;
    return $this;
  }

  public function setSOShippingMethodName(?string $SOShippingMethodName): self {
    $this->SOShippingMethodName = $SOShippingMethodName;
    return $this;
  }

  public function setSOTemplateID(?int $SOTemplateID): self {
    $this->SOTemplateID = $SOTemplateID;
    return $this;
  }
}
