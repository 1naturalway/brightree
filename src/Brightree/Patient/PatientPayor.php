<?php

namespace Brightree\Patient;

use Brightree\Enums\PayorLevel;

class PatientPayor {
  public ?string $Box10d = null;

  public ?string $Box19 = null;

  public ?int $BrightreeID = null;

  public ?bool $DoNotPrintSecondaryClaims = null;

  public EligibilityVerification $EligibilityInfo;

  public ?string $InsuranceCompanyName = null;

  public PatientInsured $Insured;

  public ?int $PatientKey = null;

  public ?int $PayorKey = null;

  public PatientPolicy $Policy;

  public ?string $PolicyContact = null;

  public PayorLevel|string|null $payorLevel = null;

  public function __construct() {
    $this->EligibilityInfo = new EligibilityVerification();
    $this->Insured = new PatientInsured();
    $this->Policy = new PatientPolicy();
  }
}
