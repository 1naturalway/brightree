<?php

namespace Brightree\ApiMessageServices;

class DiagnosisCodes {
  public $ICDCodeInfo;

  public function __construct() {
    $this->ICDCodeInfo = new ICDCodeInfo();
  }

  public function setICDCodeInfo(ICDCodeInfo $codes) {
    $this->ICDCodeInfo = $codes;
  }
}
