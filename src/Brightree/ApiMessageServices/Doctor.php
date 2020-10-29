<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Name;
use Brightree\ApiMessageServices\MedicalInfo;
use Brightree\ApiMessageServices\GoScriptsSettings;

class Doctor {
  public $Name;
  public $MedicalInfo;
  public $GoScriptsSettings;

  public function __construct() {
    $this->Name = new Name();
    $this->MedicalInfo = new MedicalInfo();
    $this->GoScriptsSettings = new GoScriptsSettings();
  }
}
