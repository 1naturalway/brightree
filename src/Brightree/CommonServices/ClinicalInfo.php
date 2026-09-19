<?php

namespace Brightree\CommonServices;

use Brightree\ApiMessageServices\DoctorInfo;

class ClinicalInfo {
  public DoctorInfo $OrderingDoctor;

  public function __construct() {
    $this->OrderingDoctor = new DoctorInfo();
  }

  public function getOrderingDoctor(DoctorInfo $orderingDoctor): DoctorInfo {
    return $this->OrderingDoctor = $orderingDoctor;
  }
}
