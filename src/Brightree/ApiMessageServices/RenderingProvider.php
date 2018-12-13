<?php

namespace Brightree\ApiMessageServices;

class RenderingProvider {
  public $Doctor;
  public $Facility;
  public $Type;

  /**
   * Set the value of Doctor
   *
   * @return  self
   */
  public function setDoctor($Doctor)
  {
    $this->Doctor = $Doctor;

    return $this;
  }

  /**
   * Set the value of Facility
   *
   * @return  self
   */
  public function setFacility($Facility)
  {
    $this->Facility = $Facility;

    return $this;
  }
}
