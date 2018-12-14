<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\ContactInfo;
use Brightree\CommonServices\Name;
use Brightree\CommonServices\Address;

class PatientInfo {
  public $BrightreeID;
  public $Name;
  public $Address;
  public $ContactInfo;
  public $MarketingRep;
  public $Practitioner;
  public $Gender;
  public $PatientID;
  public $PtHeight;
  public $PtWeight;
  public $SSN;
  public $FunctionalAbility;
  public $DOB;

  public function __construct() {
    $this->Name = new Name();
    $this->Address = new Address();
    $this->ContactInfo = new ContactInfo();
  }

  public function setGender($Gender) {
    $this->Gender = $Gender;
    return $this;
  }

  public function setPatientID($PatientID) {
    $this->PatientID = $PatientID;
    return $this;
  }

  public function setPtHeight($PtHeight) {
    $this->PtHeight = $PtHeight;
    return $this;
  }

  public function setPtWeight($PtWeight) {
    $this->PtWeight = $PtWeight;
    return $this;
  }

  public function setSSN($SSN) {
    $this->SSN = $SSN;
    return $this;
  }

  public function setDOB($DOB) {
    $this->DOB = $DOB;
    return $this;
  }
}
