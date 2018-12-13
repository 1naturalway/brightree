<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\ContactInfo;
use Brighttree\ApiMessageServices\LookupValue;

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

public function setContactInfo(ContactInfo $contact) {
    $this->ContactInfo = $contact;
  }

public function setMarketingRep(LookupValue $marketingRep) {
    $this->MarketingRep = $marketingRep;
  }

public function setPractitioner(LookupValue $practitioner) {
    $this->Practitionero = $practitioner;
  }

  public function setFunctionalAbility(LookupValue $functionalAbility) {
    $this->FunctionalAbility = $functionalAbility;
  }
}
