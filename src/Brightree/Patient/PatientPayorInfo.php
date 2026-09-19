<?php

namespace Brightree\Patient;

use Brightree\CommonServices\BasePayorInfo;
use Brightree\CommonServices\Address;

class PatientPayorInfo extends BasePayorInfo {
  public Address $Address;

  public ?int $BrightreeID = null;

  public ?string $Deductible = null;

  public ?string $Employer = null;

  public ?string $EmployerContact = null;

  public ?string $PolicyContact = null;

  public ?string $PolicyHolder = null;

  public function __construct() {
    parent::__construct();
    $this->Address = new Address();
  }
}
