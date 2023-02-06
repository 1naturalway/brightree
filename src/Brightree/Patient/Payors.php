<?php

namespace Brightree\Patient;

use Brightree\Patient\PatientPayorInfo;

class Payors {
  public $PatientPayorInfo;

  public function __construct() {
    $this->PatientPayorInfo = new PatientPayorInfo();
  }
}
