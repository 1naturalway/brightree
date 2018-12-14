<?php

namespace Brightree\ApiMessageServices;

class RenderingProvider {
  public $Doctor;
  public $Facility;
  public $Type;

  public function setDoctor($Doctor) {
    $this->Doctor = $Doctor;
    return $this;
  }

  public function setFacility($Facility) {
    $this->Facility = $Facility;
    return $this;
  }

  public function setType($Type) {
    $this->Type = $Type;
    return $this;
  }
}
