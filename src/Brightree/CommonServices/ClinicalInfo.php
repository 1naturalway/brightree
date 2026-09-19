<?php

namespace Brightree\CommonServices;

use Brightree\ApiMessageServices\DoctorInfo;

class ClinicalInfo {
  /**
   * InvoiceService.wsdl calls this type OrderingDoctor; it is field-for-field
   * the same as DoctorInfo, which the other services use, so one class covers
   * both. SoapClient binds by element name and declared type, not PHP class.
   */
  public DoctorInfo $OrderingDoctor;

  public function __construct() {
    $this->OrderingDoctor = new DoctorInfo();
  }

  public function getOrderingDoctor(DoctorInfo $orderingDoctor): DoctorInfo {
    return $this->OrderingDoctor = $orderingDoctor;
  }
}
