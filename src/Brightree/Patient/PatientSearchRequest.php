<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\CommonServices\Address;
use Brightree\Enums\PatientCustomerType;

class PatientSearchRequest {
  public LookupValue $AccountGroup;

  public ?string $AccountNumber = null;

  public LookupValue $Branch;

  public ?int $BrightreeID = null;

  public ?string $CreateDateTimeEnd = null;

  public ?string $CreateDateTimeStart = null;

  /** @var \Brightree\Types\CustomFieldSearchParam[]|null */
  public ?array $CustomFieldSearchParams = null;

  public PatientCustomerType|string|null $CustomerType = null;

  public ?string $DateOfBirthDateTimeEnd = null;

  public ?string $DateOfBirthDateTimeStart = null;

  public Address $DeliveryAddress;

  public ?string $DeliveryFax = null;

  public ?string $DeliveryNote = null;

  public ?string $DeliveryPhone = null;

  public ?string $ExternalID = null;

  public ?string $FirstName = null;

  public ?bool $IsDeceased = null;

  public ?bool $IsDiabetic = null;

  public ?string $LastName = null;

  public ?string $LastUpdateDateEnd = null;

  public ?string $LastUpdateDateStart = null;

  public LookupValue $MasterFacility;

  public ?string $SSN = null;

  public LookupValue $SecurityGroup;

  public ?string $User1 = null;

  public ?string $User2 = null;

  public ?string $User3 = null;

  public ?string $User4 = null;

  public function __construct() {
    $this->AccountGroup = new LookupValue();
    $this->Branch = new LookupValue();
    $this->DeliveryAddress = new Address();
    $this->MasterFacility = new LookupValue();
    $this->SecurityGroup = new LookupValue();
  }

  public function setAccountGroup(LookupValue $AccountGroup): self {
    $this->AccountGroup = $AccountGroup;
    return $this;
  }

  public function setAccountNumber(?string $AccountNumber): self {
    $this->AccountNumber = $AccountNumber;
    return $this;
  }

  public function setBranch(LookupValue $Branch): self {
    $this->Branch = $Branch;
    return $this;
  }

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setCreateDateTimeEnd(?string $CreateDateTimeEnd): self {
    $this->CreateDateTimeEnd = $CreateDateTimeEnd;
    return $this;
  }

  public function setCreateDateTimeStart(?string $CreateDateTimeStart): self {
    $this->CreateDateTimeStart = $CreateDateTimeStart;
    return $this;
  }

  public function setCustomFieldSearchParams(?array $CustomFieldSearchParams): self {
    $this->CustomFieldSearchParams = $CustomFieldSearchParams;
    return $this;
  }

  public function setCustomerType(PatientCustomerType|string|null $CustomerType): self {
    $this->CustomerType = $CustomerType;
    return $this;
  }

  public function setDateOfBirthDateTimeEnd(?string $DateOfBirthDateTimeEnd): self {
    $this->DateOfBirthDateTimeEnd = $DateOfBirthDateTimeEnd;
    return $this;
  }

  public function setDateOfBirthDateTimeStart(?string $DateOfBirthDateTimeStart): self {
    $this->DateOfBirthDateTimeStart = $DateOfBirthDateTimeStart;
    return $this;
  }

  public function setDeliveryAddress(Address $DeliveryAddress): self {
    $this->DeliveryAddress = $DeliveryAddress;
    return $this;
  }

  public function setDeliveryFax(?string $DeliveryFax): self {
    $this->DeliveryFax = $DeliveryFax;
    return $this;
  }

  public function setDeliveryNote(?string $DeliveryNote): self {
    $this->DeliveryNote = $DeliveryNote;
    return $this;
  }

  public function setDeliveryPhone(?string $DeliveryPhone): self {
    $this->DeliveryPhone = $DeliveryPhone;
    return $this;
  }

  public function setExternalID(?string $ExternalID): self {
    $this->ExternalID = $ExternalID;
    return $this;
  }

  public function setFirstName(?string $FirstName): self {
    $this->FirstName = $FirstName;
    return $this;
  }

  public function setIsDeceased(?bool $IsDeceased): self {
    $this->IsDeceased = $IsDeceased;
    return $this;
  }

  public function setIsDiabetic(?bool $IsDiabetic): self {
    $this->IsDiabetic = $IsDiabetic;
    return $this;
  }

  public function setLastName(?string $LastName): self {
    $this->LastName = $LastName;
    return $this;
  }

  public function setLastUpdateDateEnd(?string $LastUpdateDateEnd): self {
    $this->LastUpdateDateEnd = $LastUpdateDateEnd;
    return $this;
  }

  public function setLastUpdateDateStart(?string $LastUpdateDateStart): self {
    $this->LastUpdateDateStart = $LastUpdateDateStart;
    return $this;
  }

  public function setMasterFacility(LookupValue $MasterFacility): self {
    $this->MasterFacility = $MasterFacility;
    return $this;
  }

  public function setSSN(?string $SSN): self {
    $this->SSN = $SSN;
    return $this;
  }

  public function setSecurityGroup(LookupValue $SecurityGroup): self {
    $this->SecurityGroup = $SecurityGroup;
    return $this;
  }

  public function setUser1(?string $User1): self {
    $this->User1 = $User1;
    return $this;
  }

  public function setUser2(?string $User2): self {
    $this->User2 = $User2;
    return $this;
  }

  public function setUser3(?string $User3): self {
    $this->User3 = $User3;
    return $this;
  }

  public function setUser4(?string $User4): self {
    $this->User4 = $User4;
    return $this;
  }
}
