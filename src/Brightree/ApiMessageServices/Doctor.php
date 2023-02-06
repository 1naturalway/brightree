<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Name;
use Brightree\CommonServices\Address;
use Brightree\ApiMessageServices\MedicalInfo;
use Brightree\ApiMessageServices\GoScriptsSettings;
use Brightree\CommonServices\ContactInfo;

class Doctor {
  public Address $Address;

  public int $BrightreeID;

  public LookupValue $CMNFaxSchedule;

  public ContactInfo $ContactInfo;

  public DoctorGroup $DoctorGroup;

  public string $ExternalID;

  public Facility $Facility;

  public GoScriptsSettings $GoScriptsSettings;

  public MarketingRep $MarketingRep;

  public MedicalInfo $MedicalInfo;

  public Name $Name;

  public UserDefinedData $UserDefinedData;

  public function __construct() {
    $this->Address = new Address();
    $this->CMNFaxSchedule = new LookupValue();
    $this->ContactInfo = new ContactInfo();
    $this->DoctorGroup = new DoctorGroup();
    $this->Facility = new Facility();
    $this->GoScriptsSettings = new GoScriptsSettings();
    $this->MarketingRep = new MarketingRep();
    $this->MedicalInfo = new MedicalInfo();
    $this->Name = new Name();
    $this->UserDefinedData = new UserDefinedData();
  }
}
