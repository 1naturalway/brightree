<?php

namespace Brightree\ApiMessageServices;

class DiagnosisCodes {
  public ICDCodeInfo $ICDCodeInfo;

  public function __construct() {
    $this->ICDCodeInfo = new ICDCodeInfo();
  }

  public function setICDCodeInfo(ICDCodeInfo $codes): void {
    $this->ICDCodeInfo = $codes;
  }
}
