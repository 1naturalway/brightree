<?php

namespace Brightree\Services;

use Brightree\OrderEntryService;
use Brightree\Patient\Patient;

class PatientService extends OrderEntryService {
  public function __construct() {
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1610/OrderEntryService/patientservice.svc?singleWsdl";
  }

  public function createPatient() {
    return new Patient();
  }
}
