<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;

class SalesOrderGeneralInfo {
  public $Branch;

  public $ClaimNote;

  public $ClaimNoteTypeKey;

  public $DateofAdmission;

  public $DiscountDischarge;

  public $DiscountPercent;

  public $ExcludeEligibilityCheck;

  public $InventoryLocation;

  public $ManualHold;

  public $ManualHoldReason;

  public $PlaceOfService;

  public $PONumber;

  public $PrintDate;

  public $Printed;

  public $SalesOrderClassification;

  public $Status;

  public $StopDate;

  public $Reference;

  public $TemplateStatus;

  public $User1;

  public $User2;

  public $User3;

  public $User4;

  public $WIPAssignedTo;

  public $WIPState;

  public function __construct() {
    $this->Branch = new LookupValue();
    $this->InventoryLocation = new LookupValue();
    $this->PlaceOfService = new LookupValue();
  }

  public function getBranch(LookupValue $branch) {
    $this->Branch = $branch;
  }

  public function getInventoryLocation(LookupValue $location) {
    $this->InventoryLocation = $location;
  }

  public function getPlaceOfService(LookupValue $pos) {
    $this->PlaceOfService = $pos;
  }

  public function setClaimNote($ClaimNote) {
    $this->ClaimNote = $ClaimNote;
    return $this;
  }

  public function setClaimNoteTypeKey($ClaimNoteTypeKey) {
    $this->ClaimNoteTypeKey = $ClaimNoteTypeKey;
    return $this;
  }

  public function setDateofAdmission($DateofAdmission) {
    $this->DateofAdmission = $DateofAdmission;
    return $this;
  }

  public function setDiscountDischarge($DiscountDischarge) {
    $this->DiscountDischarge = $DiscountDischarge;
    return $this;
  }

  public function setDiscountPercent($DiscountPercent) {
    $this->DiscountPercent = $DiscountPercent;
    return $this;
  }

  public function setExcludeEligibilityCheck($ExcludeEligibilityCheck) {
    $this->ExcludeEligibilityCheck = $ExcludeEligibilityCheck;
    return $this;
  }

  public function setManualHold($ManualHold) {
    $this->ManualHold = $ManualHold;
    return $this;
  }

  public function setManualHoldReason($ManualHoldReason) {
    $this->ManualHoldReason = $ManualHoldReason;
    return $this;
  }

  public function setPONumber($PONumber) {
    $this->PONumber = $PONumber;
    return $this;
  }

  public function setPrintDate($PrintDate) {
    $this->PrintDate = $PrintDate;
    return $this;
  }

  public function setPrinted($Printed) {
    $this->Printed = $Printed;
    return $this;
  }

  public function setSalesOrderClassification($SalesOrderClassification) {
    $this->SalesOrderClassification = $SalesOrderClassification;
    return $this;
  }

  public function setStatus($Status) {
    $this->Status = $Status;
    return $this;
  }

  public function setStopDate($StopDate) {
    $this->StopDate = $StopDate;
    return $this;
  }

  public function setReference($Reference) {
    $this->Reference = $Reference;
    return $this;
  }

  public function setTemplateStatus($TemplateStatus) {
    $this->TemplateStatus = $TemplateStatus;

    return $this;
  }

  public function setUser1($User1) {
    $this->User1 = $User1;

    return $this;
  }

  public function setUser2($User2) {
    $this->User2 = $User2;
    return $this;
  }

  public function setUser3($User3) {
    $this->User3 = $User3;
    return $this;
  }

  public function setUser4($User4) {
    $this->User4 = $User4;

    return $this;
  }

  public function setWIPAssignedTo($WIPAssignedTo) {
    $this->WIPAssignedTo = $WIPAssignedTo;
    return $this;
  }

  public function setWIPState($WIPState) {
    $this->WIPState = $WIPState;
    return $this;
  }
}
