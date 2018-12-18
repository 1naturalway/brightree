<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\Referral;
use Brightree\ApiMessageServices\DoctorInfo;
use Brightree\ApiMessageServices\RenderingProvider;

class PatientClinicalInfo {
  public $DateOfDeath;
  public $DiagnosisCodes;
  public $FunctionalAbility;
  public $Gender;
  public $Height;
  public $InfectiousCondition;
  public $MarketingReferral;
  public $MarketingRep;
  public $OrderingDoctor;
  public $PatientCondition;
  public $Practitioner;
  public $PrimaryDoctor;
  public $RenderingProvider;
  public $Weight;

  public function __construct() {
    $this->DiagnosisCodes = [];
    $this->FunctionalAbility = new LookupValue();
    $this->Practitioner = new LookupValue();
    $this->MarketingRep = new LookupValue();


    $this->MarketingReferral = new Referral();

    $this->OrderingDoctor = new DoctorInfo();
    $this->PrimaryDoctor = new DoctorInfo();

    $this->PatientCondition = new PatientCondition();
    $this->RenderingProvider = new RenderingProvider();
  }
}
