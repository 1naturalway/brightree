<?php

namespace Brightree\Patient;

class PatientPayor {
  public $Box10d;

  public $Box19;

  public $BrightreeID;

  public $DoNotPrintSecondaryClaims;

  public $EligibilityInfo;

  public $InsuranceCompanyName;

  public $Insured;

  public $PatientKey;

  public $PayorKey;

  public $Policy;

  public $PolicyContact;

  public $payorLevel;

  public function __construct() {
    $this->EligibilityInfo = new EligibilityVerification();
    $this->Insured = new PatientInsured();
    $this->Policy = new PatientPolicy();
  }
}
