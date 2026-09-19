<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\DoctorInfo;
use Brightree\ApiMessageServices\ICDCodeInfo;
use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\Referral;
use Brightree\ApiMessageServices\RenderingProvider;
use Brightree\Enums\Gender;

class PatientClinicalInfo {
  public ?bool $AirborneTransmission = null;

  public ?bool $ContactTransmission = null;

  public ?string $DateOfDeath = null;

  /** @var ICDCodeInfo[] */
  public array $DiagnosisCodes = [];

  public ?bool $DropletTransmission = null;

  public ?string $EnableSubscribeDate = null;

  public LookupValue $FunctionalAbility;

  public Gender|string|null $Gender = null;

  public ?float $Height = null;

  public ?bool $InfectiousCondition = null;

  public Referral $MarketingReferral;

  public LookupValue $MarketingRep;

  public DoctorInfo $OrderingDoctor;

  public PatientCondition $PatientCondition;

  public LookupValue $Practitioner;

  public DoctorInfo $PrimaryDoctor;

  public RenderingProvider $RenderingProvider;

  public ?float $Weight = null;

  public function __construct() {
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
