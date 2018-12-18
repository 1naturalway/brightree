<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\WorkersCompensation;

class PatientInsuranceInfo {
  public $HardshipDiscountPct;
  public $HardshipReviewDate;
  public $HardshipStartDate;
  public $IsHardship;
  public $EmploymentStatus;
  public $MaritalStatus;
  public $Payors;
  public $PrintAmountOnDeliveryTicket;
  public $workersCompensation;

  public function __construct() {
    $this->Payors = new Payors();
    $this->workersCompensation = new WorkersCompensation();
  }

  public function setHardshipDiscountPct($HardshipDiscountPct) {
    $this->HardshipDiscountPct = $HardshipDiscountPct;
    return $this;
  }

  public function setHardshipReviewDate($HardshipReviewDate) {
    $this->HardshipReviewDate = $HardshipReviewDate;
    return $this;
  }

  public function setHardshipStartDate($HardshipStartDate) {
    $this->HardshipStartDate = $HardshipStartDate;
    return $this;
  }

  public function setIsHardship($IsHardship) {
    $this->IsHardship = $IsHardship;
    return $this;
  }

  public function setEmploymentStatus($EmploymentStatus) {
    $this->EmploymentStatus = $EmploymentStatus;
    return $this;
  }

  public function setMaritalStatus($MaritalStatus) {
    $this->MaritalStatus = $MaritalStatus;
    return $this;
  }

  public function getPayors(PatientPayorInfo $patientPayorInfo) {
    return $this->Payors = $patientPayorInfo;
  }

  public function setPrintAmountOnDeliveryTicket($PrintAmountOnDeliveryTicket) {
    $this->PrintAmountOnDeliveryTicket = $PrintAmountOnDeliveryTicket;
    return $this;
  }

  public function getworkersCompensation() {
    return $this->workersCompensation;
  }
}
