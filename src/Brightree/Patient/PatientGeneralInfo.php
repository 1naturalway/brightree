<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;

class PatientGeneralInfo {
  public $AccountGroup;
  public $AccountNumber;
  public $AccountOnHold;
  public $BillingAddress;
  public $BillingContactInfo;
  public $BirthDate;
  public $Branch;
  public $CustomerType; // Not sure on this one 'PatientCustomerType'
  public $DateofAdmission;
  public $DeliveryAddress;
  public $DeliveryPhone;
  public $DiscountPercent;
  public $EmergencyContact; // Not sure on this one 'PatientContact'
  public $Facility;
  public $HIPAASignatureOnFile;
  public $HoldBillingStatement;
  public $Name;
  public $PlaceOfService;
  public $PtID;
  public $SSN;
  public $ResponsibleParty;
  public $TaxZone;
  public $User1;
  public $User2;
  public $User3;
  public $User4;

  public function __construct() {
    $this->AccountGroup = new LookupValue();
    $this->BillingAddress = new Address();
    $this->BillingContactInfo = new ContactInfo();
    $this->Branch = new LookupValue();
    $this->DeliveryAddress = new Address();
    $this->Facility = new LookupValue();
    $this->PlaceOfService = new LookupValue();
  }

  public function getAccountGroup(LookupValue $accountNumber) {
    return $this->AccountGroup = $accountNumber;
  }

  public function setAccountNumber($AccountNumber) {
    $this->AccountNumber = $AccountNumber;
    return $this;
  }

  public function setAccountOnHold($AccountOnHold) {
    $this->AccountOnHold = $AccountOnHold;
    return $this;
  }

  public function getBillingAddress(Address $billing) {
    return $this->BillingAddress = $billing;
  }

  public function getBillingContactInfo(ContactInfo $billingContactInfo) {
    return $this->BillingContactInfo = $billingContactInfo;
  }

  public function setBirthDate($BirthDate) {
    $this->BirthDate = $BirthDate;
    return $this;
  }

  public function getBranch(LookupValue $branch) {
    return $this->Branch = $branch;
  }

  public function setCustomerType($CustomerType) {
    $this->CustomerType = $CustomerType;
    return $this;
  }

  public function setDateofAdmission($DateofAdmission) {
    $this->DateofAdmission = $DateofAdmission;
    return $this;
  }

  public function getDeliveryAddress(Address $deliveryAddress) {
    return $this->DeliveryAddress = $deliveryAddress;
  }

  public function setDeliveryPhone($DeliveryPhone) {
    $this->DeliveryPhone = $DeliveryPhone;
    return $this;
  }

  public function setDiscountPercent($DiscountPercent) {
    $this->DiscountPercent = $DiscountPercent;
    return $this;
  }

  public function getEmergencyContact() {
    return $this->EmergencyContact;
  }

  public function getFacility(LookupValue $facility) {
    return $this->Facility = $facility;
  }

  public function setHIPAASignatureOnFile($HIPAASignatureOnFile) {
    $this->HIPAASignatureOnFile = $HIPAASignatureOnFile;
    return $this;
  }

  public function setHoldBillingStatement($HoldBillingStatement) {
    $this->HoldBillingStatement = $HoldBillingStatement;
    return $this;
  }

  public function setName($Name) {
    $this->Name = $Name;
    return $this;
  }

  public function getPlaceOfService(LookupValue $pos) {
    return $this->PlaceOfService = $pos;
  }

  public function setPtID($PtID) {
    $this->PtID = $PtID;
    return $this;
  }

  public function setSSN($SSN) {
    $this->SSN = $SSN;
    return $this;
  }

  public function getResponsibleParty() {
    return $this->ResponsibleParty;
  }

  public function getTaxZone(LookupValue $taxZone) {
    return $this->TaxZone = $taxZone;
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
}
