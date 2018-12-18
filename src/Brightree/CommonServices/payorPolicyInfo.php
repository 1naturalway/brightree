<?php

namespace Brightree\CommonServices;

class payorPolicyInfo {
  public $BrightreeID;
  public $EffectiveDate;
  public $EffectiveEndDate;
  public $Fax;
  public $GroupNumber;
  public $Name;
  public $PatientPayorKey;
  public $Phone;
  public $PolicyNumber;
  public $Verified;

  public function getName(Name $name) {
    return $this->Name = $name;
  }

  public function setBrightreeID($BrightreeID) {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setEffectiveDate($EffectiveDate) {
    $this->EffectiveDate = $EffectiveDate;
    return $this;
  }

  public function setEffectiveEndDate($EffectiveEndDate) {
    $this->EffectiveEndDate = $EffectiveEndDate;
    return $this;
  }

  public function setFax($Fax) {
    $this->Fax = $Fax;
    return $this;
  }

  public function setPatientPayorKey($PatientPayorKey) {
    $this->PatientPayorKey = $PatientPayorKey;
    return $this;
  }

  public function setPhone($Phone) {
    $this->Phone = $Phone;
    return $this;
  }

  public function setPolicyNumber($PolicyNumber) {
    $this->PolicyNumber = $PolicyNumber;
    return $this;
  }

  public function setVerified($Verified) {
    $this->Verified = $Verified;
    return $this;
  }
}
