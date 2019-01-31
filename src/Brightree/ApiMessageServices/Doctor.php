<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Name;
use Brightree\ApiMessageServices\MedicalInfo;

class Doctor {
  public $Name;
  public $MedicalInfo;

  public function __construct() {
    $this->Name = new Name();
    $this->MedicalInfo = new MedicalInfo();
  }
}
