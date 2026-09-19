<?php

namespace Brightree\ApiMessageServices;

use Brightree\ApiMessageServices\GoScriptsSettings;
use Brightree\ApiMessageServices\MedicalInfo;
use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;
use Brightree\CommonServices\Name;
use Brightree\Enums\PreferredMethodContactType;

class Doctor {
  public Address $Address;

  public ?int $BrightreeID = null;

  public LookupValue $CMNFaxSchedule;

  public ContactInfo $ContactInfo;

  public DoctorGroup $DoctorGroup;

  public ?string $ExternalID = null;

  public Facility $Facility;

  public GoScriptsSettings $GoScriptsSettings;

  public ?bool $Inactive = null;

  public MarketingRep $MarketingRep;

  public MedicalInfo $MedicalInfo;

  public Name $Name;

  public PreferredMethodContactType|string|null $PreferredMethodOfContact = null;

  public UserDefinedData $UserDefindedData;

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
    $this->UserDefindedData = new UserDefinedData();
  }
}
