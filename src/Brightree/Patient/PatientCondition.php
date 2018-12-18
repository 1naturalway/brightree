<?php

namespace Brightree\Patient;

class PatientCondition {
  public $PatientDiabeticCondition;

  public function __construct() {
    $this->PatientDiabeticCondition = new PatientDiabeticCondition();
  }
}
