<?php

namespace Brightree\Services;

use Brightree\OrderEntryService;
use Brightree\Patient\Patient;
use Brightree\Patient\PatientPayor;
use SoapClient;

class PatientService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1802/OrderEntryService/patientservice.svc?singleWsdl";
  }

  public function ApiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function getPatient($patientBrightreeID) {
    return $this->apiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $patientBrightreeID]);
  }

  public function createPatient(Patient $patient) {
    return $this->apiCall('PatientCreate', ['Patient' => $patient]);
  }

  public function updatePatient(Patient $patient, $patientBrightreeID) {
    return $this->apiCall('PatientUpdate', [
      'BrightreeID' => $patientBrightreeID,
      'Patient' => $patient
    ]);
  }

  public function addPayor($patientPayor) {
    return $this->apiCall('PatientPayorAdd', [
      'PatientKey' => $patientPayor->PatientKey,
      'PayorKey' => $patientPayor->PayorKey,
      'PatientPayor' => $patientPayor
    ]);
  }

  public function getPayors($patientBrightreeID) {
   $patient = $this->apiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $patientBrightreeID]);
   return $patient->PatientFetchByBrightreeIDResult->Items->Patient->PatientInsuranceInfo->Payors->PatientPayorInfo;
  }
}
