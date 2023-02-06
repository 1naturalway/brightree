<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\Referral;
use Brightree\ApiMessageServices\DoctorInfo;
use Brightree\ApiMessageServices\RenderingProvider;

class PatientClinicalInfo {
  public bool $AirborneTransmission;

  public bool $ContactTransmission;

  public $DateOfDeath;

  public array $DiagnosisCodes;

  public bool $DropletTransmission;

  public LookupValue $FunctionalAbility;

  public string $Gender;

  public float $Height;

  public bool $InfectiousCondition;

  public Referral $MarketingReferral;

  public LookupValue $MarketingRep;

  public DoctorInfo $OrderingDoctor;

  public PatientCondition $PatientCondition;

  public LookupValue $Practitioner;

  public DoctorInfo $PrimaryDoctor;

  public RenderingProvider $RenderingProvider;

  public float $Weight;

  public function __construct() {
    $this->DiagnosisCodes = [];
    $this->FunctionalAbility = new LookupValue();
    $this->MarketingReferral = new Referral();
    $this->MarketingRep = new LookupValue();
    $this->OrderingDoctor = new DoctorInfo();
    $this->PatientCondition = new PatientCondition();
    $this->Practitioner = new LookupValue();
    $this->PrimaryDoctor = new DoctorInfo();
    $this->RenderingProvider = new RenderingProvider();
  }
}
