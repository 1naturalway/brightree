<?php

namespace Brightree\Patient;

use Brightree\CommonServices\Address;

class PatientPayorInfo {
  public $BrightreeID;
  public $Deductable;
  public $Address;
  public $Employer;
  public $EmployerContact;
  public $PolicyContact;
  public $PolicyHolder;

  public function __construct() {
    $this->Address = new Address();
  }

  public function setBrightreeID($BrightreeID) {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setDeductable($Deductable) {
    $this->Deductable = $Deductable;
    return $this;
  }

  public function getAddress(Address $address) {
    return $this->Address = $address;
  }

  public function setEmployer($Employer) {
    $this->Employer = $Employer;
    return $this;
  }

  public function setEmployerContact($EmployerContact) {
    $this->EmployerContact = $EmployerContact;
    return $this;
  }

  public function setPolicyContact($PolicyContact) {
    $this->PolicyContact = $PolicyContact;
    return $this;
  }

  public function setPolicyHolder($PolicyHolder) {
    $this->PolicyHolder = $PolicyHolder;
    return $this;
  }
}
