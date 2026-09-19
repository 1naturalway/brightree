<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\ContactInfo;
use Brightree\CommonServices\Name;
use Brightree\CommonServices\Address;

class PatientInfo {
  public ?int $BrightreeID = null;

  public Name $Name;

  public Address $Address;

  public ContactInfo $ContactInfo;

  public ?LookupValue $MarketingRep = null;

  public ?LookupValue $Practitioner = null;

  public ?string $Gender = null;

  public ?int $PatientID = null;

  public ?float $PtHeight = null;

  public ?float $PtWeight = null;

  public ?string $SSN = null;

  public ?LookupValue $FunctionalAbility = null;

  public ?string $DOB = null;

  public LookupValue $AccountGroup;

  public ?string $AccountNumber = null;

  public ?bool $HIPAASignatureOnFile = null;

  public function __construct() {
    $this->Name = new Name();
    $this->Address = new Address();
    $this->ContactInfo = new ContactInfo();
    $this->AccountGroup = new LookupValue();
  }

  public function setGender(?string $Gender): self {
    $this->Gender = $Gender;
    return $this;
  }

  public function setPatientID(?int $PatientID): self {
    $this->PatientID = $PatientID;
    return $this;
  }

  public function setPtHeight(?float $PtHeight): self {
    $this->PtHeight = $PtHeight;
    return $this;
  }

  public function setPtWeight(?float $PtWeight): self {
    $this->PtWeight = $PtWeight;
    return $this;
  }

  public function setSSN(?string $SSN): self {
    $this->SSN = $SSN;
    return $this;
  }

  public function setDOB(?string $DOB): self {
    $this->DOB = $DOB;
    return $this;
  }

  public function setAccountNumber(?string $AccountNumber): self {
    $this->AccountNumber = $AccountNumber;
    return $this;
  }

  public function setHIPAASignatureOnFile(?bool $HIPAASignatureOnFile): self {
    $this->HIPAASignatureOnFile = $HIPAASignatureOnFile;
    return $this;
  }
}
