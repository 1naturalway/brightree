<?php

namespace Brightree\Patient;



class PatientInsuranceInfo {
  public $HardshipDiscountPct;
  public $HardshipReviewDate;
  public $HardshipStartDate;
  public $IsHardship;
  public $EmploymentStatus;
  public $MaritalStatus;
  public $Payers;
  public $PrintAmountOnDeliveryTicket;
  public $WorkersCompensation;

  public function __construct() {
    $this->Payers = new PatientPayorInfo;
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

  public function getPayers(PatientPayorInfo $patientPayorInfo) {
    return $this->Payers = $patientPayorInfo;
  }

  public function setPrintAmountOnDeliveryTicket($PrintAmountOnDeliveryTicket) {
    $this->PrintAmountOnDeliveryTicket = $PrintAmountOnDeliveryTicket;
    return $this;
  }

  public function getWorkersCompensation() {
    return $this->WorkersCompensation;
  }
}
