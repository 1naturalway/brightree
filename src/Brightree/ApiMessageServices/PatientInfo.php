<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\ContactInfo;
use Brightree\ApiMessageServices\LookupValue;
use Brightree\CommonServices\Name;
use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;

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

  public function getContactInfo(ContactInfo $contact) {
    $this->ContactInfo = $contact;
  }

  public function getMarketingRep(LookupValue $marketingRep) {
    $this->MarketingRep = $marketingRep;
  }

  public function getPractitioner(LookupValue $practitioner) {
    $this->Practitionero = $practitioner;
  }

  public function getFunctionalAbility(LookupValue $functionalAbility) {
    $this->FunctionalAbility = $functionalAbility;
  }

  public function getName(Name $name) {
    $this->Name = $name;
  }

  public function getAddress(Address $address) {
    return $this->Address = $address;
  }

  public function getContactInfo(ContactInfo $contactInfo) {
    return $this->ContactInfo = $contactInfo;
  }

  public function getMarketingRep(LookupValue $lookupValue) {
    return $this->MarketingRep = $lookupValue;
  }

  public function getPractitioner(LookupValue $lookupValue) {
    return $this->Practitioner = $lookupValue;
  }

  public function setGender($Gender) {
    return $this->Gender = $Gender;
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

  public function getFunctionalAbility(LookupValue $lookupValue) {
    return $this->FunctionalAbility = $lookupValue;
  }

  public function setDOB($DOB) {
    $this->DOB = $DOB;
    return $this;
  }
}
