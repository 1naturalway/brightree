<?php

namespace Brightree\Patient;

use Brightree\CommonServices\Address;

class PatientPayorInfo extends BasePayorInfo {
  public $Address;

  public $BrightreeID;

  public $Deductible;

  public $Employeer;

  public $EmployerContact;

  public $PolicyContact;

  public $PolicyHolder;

  public function __construct() {
    $this->Address = new Address();
  }
}
