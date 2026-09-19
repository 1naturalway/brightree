<?php

namespace Brightree\Patient;

class PatientCondition {
  public PatientDiabeticCondition $PatientDiabeticCondition;

  public function __construct() {
    $this->PatientDiabeticCondition = new PatientDiabeticCondition();
  }
}
