<?php

namespace Brightree\CommonServices;

class Patient {
  public $AccountGroup;
  public $AccountNumber;
  public $Address;
  public $BrightreeID;
  public $ContactInfo;
  public $DOB;
  public $FunctionalAbility;
  public $Gender;
  public $HIPAASignatureOnFile;
  public $MarketingRep;
  public $Name;
  public $PatientID;
  public $Practitioner;
  public $PtHeight;
  public $PtWeight;
  public $SSN;


  public function __construct() {
    $this->Address = new Address();
    $this->ContactInfo = new ContactInfo();
    $this->Name = new Name();
  }

  public function setAccountGroup($AccountGroup) {
    $this->AccountGroup = $AccountGroup;
    return $this;
  }

  public function setAccountNumber($AccountNumber) {
    $this->AccountNumber = $AccountNumber;
    return $this;
  }

  public function getAddress(Address $address) {
    $this->Address = $address;
  }

  public function getContactInfo(ContactInfo $contactInfo) {
    $this->ContactInfo = $contactInfo;
  }

  public function getName(Name $name) {
    $this->Name = $name;
  }

  public function setBrightreeID($BrightreeID)
  {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setDOB($DOB) {
    $this->DOB = $DOB;
    return $this;
  }

  public function setFunctionalAbility($FunctionalAbility) {
    $this->FunctionalAbility = $FunctionalAbility;
    return $this;
  }

  public function setGender($Gender) {
    $this->Gender = $Gender;
    return $this;
  }

  public function setHIPAASignatureOnFile($HIPAASignatureOnFile) {
    $this->HIPAASignatureOnFile = $HIPAASignatureOnFile;
    return $this;
  }

  public function setMarketingRep($MarketingRep) {
    $this->MarketingRep = $MarketingRep;
    return $this;
  }

  public function setPatientID($PatientID) {
    $this->PatientID = $PatientID;
    return $this;
  }

  public function setPractitioner($Practitioner) {
    $this->Practitioner = $Practitioner;
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
}
