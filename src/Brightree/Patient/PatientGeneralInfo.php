<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;
use Brightree\CommonServices\Name;
use Brightree\CommonServices\EmergencyContact;
use Brightree\CommonServices\ResponsiblePartyContact;

class PatientGeneralInfo {
  public LookupValue $AccountGroup;

  public string $AccountNumber;

  public bool $AccountOnHold;

  public Address $BillingAddress;

  public ContactInfo $BillingContactInfo;

  public $BirthDate;

  public LookupValue $Branch;

  public string $CustomerType;

  public $DateofAdmission;

  public $DateofDischarge;

  public Address $DeliveryAddress;

  public string $DeliveryNote;

  public string $DeliveryPhone;

  public float $DiscountPercent;

  public EmergencyContact $EmergencyContact;

  public LookupValue $Facility;

  public bool $HIPAASignatureOnFile;

  public bool $HoldBillingStatement;

  public Name $Name;

  public LookupValue $PlaceOfService;

  public string $PtID;

  public ResponsiblePartyContact $ResponsiblePartyContact;

  public bool $RestrictedAccess;

  public string $SSN;

  public LookupValue $SecurityGroup;

  public LookupValue $TaxZone;

  public string $User1;

  public string $User2;

  public string $User3;

  public string $User4;

  public function __construct() {
    $this->AccountGroup = new LookupValue();
    $this->BillingAddress = new Address();
    $this->BillingContactInfo = new ContactInfo();
    $this->Branch = new LookupValue();
    $this->DeliveryAddress = new Address();
    $this->EmergencyContact = new EmergencyContact();
    $this->Facility = new LookupValue();
    $this->Name = new Name();
    $this->PlaceOfService = new LookupValue();
    $this->ResponsiblePartyContact = new ResponsiblePartyContact();
    $this->SecurityGroup = new LookupValue();
    $this->TaxZone = new LookupValue();
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

  public function getResponsiblePartyContact() {
    return $this->ResponsiblePartyContact;
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

  public function setRestrictedAccess($RestrictedAccess) {
    $this->RestrictedAccess = $RestrictedAccess;

    return $this;
  }
}
