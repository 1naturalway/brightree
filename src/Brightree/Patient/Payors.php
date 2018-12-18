<?php

namespace Brightree\Patient;

use Brightree\CommonServices;

class Payors {
  public $PatientPayorInfo;

  public function __construct() {
    $this->PatientPayorInfo = new PatientPayorInfo();
  }
}
