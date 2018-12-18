<?php

namespace Brightree\Services;

use Brightree\OrderEntryService;
use Brightree\Patient\Patient;
use SoapClient;

class PatientService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1802/OrderEntryService/patientservice.svc?singleWsdl";
  }

  public function apiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function createPatient() {
    return new Patient();
  }
}
