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

  public ?string $BirthDate = null;

  public LookupValue $Branch;

  public string $CustomerType;

  public ?string $DateOfAdmission = null;

  public ?string $DateOfDischarge = null;

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

  public ?bool $PatientHubRegistered = null;

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

  public function getAccountGroup(LookupValue $accountNumber): LookupValue {
    return $this->AccountGroup = $accountNumber;
  }

  public function setAccountNumber(string $AccountNumber): self {
    $this->AccountNumber = $AccountNumber;
    return $this;
  }

  public function setAccountOnHold(bool $AccountOnHold): self {
    $this->AccountOnHold = $AccountOnHold;
    return $this;
  }

  public function getBillingAddress(Address $billing): Address {
    return $this->BillingAddress = $billing;
  }

  public function getBillingContactInfo(ContactInfo $billingContactInfo): ContactInfo {
    return $this->BillingContactInfo = $billingContactInfo;
  }

  public function setBirthDate(?string $BirthDate): self {
    $this->BirthDate = $BirthDate;
    return $this;
  }

  public function getBranch(LookupValue $branch): LookupValue {
    return $this->Branch = $branch;
  }

  public function setCustomerType(string $CustomerType): self {
    $this->CustomerType = $CustomerType;
    return $this;
  }

  public function setDateOfAdmission(?string $DateOfAdmission): self {
    $this->DateOfAdmission = $DateOfAdmission;
    return $this;
  }

  public function getDeliveryAddress(Address $deliveryAddress): Address {
    return $this->DeliveryAddress = $deliveryAddress;
  }

  public function setDeliveryPhone(string $DeliveryPhone): self {
    $this->DeliveryPhone = $DeliveryPhone;
    return $this;
  }

  public function setDiscountPercent(float $DiscountPercent): self {
    $this->DiscountPercent = $DiscountPercent;
    return $this;
  }

  public function getEmergencyContact(): EmergencyContact {
    return $this->EmergencyContact;
  }

  public function getFacility(LookupValue $facility): LookupValue {
    return $this->Facility = $facility;
  }

  public function setHIPAASignatureOnFile(bool $HIPAASignatureOnFile): self {
    $this->HIPAASignatureOnFile = $HIPAASignatureOnFile;
    return $this;
  }

  public function setHoldBillingStatement(bool $HoldBillingStatement): self {
    $this->HoldBillingStatement = $HoldBillingStatement;
    return $this;
  }

  public function setName(Name $Name): self {
    $this->Name = $Name;
    return $this;
  }

  public function getPlaceOfService(LookupValue $pos): LookupValue {
    return $this->PlaceOfService = $pos;
  }

  public function setPtID(string $PtID): self {
    $this->PtID = $PtID;
    return $this;
  }

  public function setSSN(string $SSN): self {
    $this->SSN = $SSN;
    return $this;
  }

  public function getResponsiblePartyContact(): ResponsiblePartyContact {
    return $this->ResponsiblePartyContact;
  }

  public function getTaxZone(LookupValue $taxZone): LookupValue {
    return $this->TaxZone = $taxZone;
  }

  public function setUser1(string $User1): self {
    $this->User1 = $User1;
    return $this;
  }

  public function setUser2(string $User2): self {
    $this->User2 = $User2;
    return $this;
  }

  public function setUser3(string $User3): self {
    $this->User3 = $User3;
    return $this;
  }

  public function setUser4(string $User4): self {
    $this->User4 = $User4;
    return $this;
  }

  public function setRestrictedAccess(bool $RestrictedAccess): self {
    $this->RestrictedAccess = $RestrictedAccess;

    return $this;
  }

  public function setPatientHubRegistered(?bool $PatientHubRegistered): self {
    $this->PatientHubRegistered = $PatientHubRegistered;
    return $this;
  }
}
