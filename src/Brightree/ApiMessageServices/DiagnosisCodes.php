<?php

namespace Brightree\SalesOrder;

class DiagnosisCodes {
  public $DiagnosisCodes;

  public function __construct() {
    $this->DiagnosisCodes = new ICDCodeInfo();
  }

  public function setDiagnosisCodes(ICDCodeInfo $codes) {
    $this->DiagnosisCodes = $codes;
  }
}
