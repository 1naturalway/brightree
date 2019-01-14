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

  public function PatientFetchbyBrightreeID($patientBrightreeID) {
    return $this->apiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $patientBrightreeID]);
  }

  public function PatientCreate(Patient $patient) {
    return $this->apiCall('PatientCreate', ['Patient' => $patient]);
  }

  public function PatientUpdate(Patient $patient, $patientBrightreeID) {
    return $this->apiCall('PatientUpdate', [
      'BrightreeID' => $patientBrightreeID,
      'Patient' => $patient
    ]);
  }


  public function PatientPayorInfo($BrightreeID) {
   $patient = $this->apiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $patientBrightreeID]);
   return $patient->PatientFetchByBrightreeIDResult->Items->Patient->PatientInsuranceInfo->Payors->PatientPayorInfo;
  }

  public function PatientPayorAdd($patientPayor) {
    return $this->apiCall('PatientPayorAdd', [
      'PatientKey' => $patientPayor->PatientKey,
      'PayorKey' => $patientPayor->PayorKey,
      'PatientPayor' => $patientPayor
    ]);
  }

  public function PatientPayorFetch($patientKey, $payorKey) {
    return $this->apiCall('PatientPayorFetch', [
      'PatientKey' => $patientKey,
      'PayorKey' => $payorKey
    ]);
  }

  public function PatientPayorFetchAll($patientKey) {
    return $this->apiCall('PatientPayorFetchAll', ['PatientKey' => $patientKey]);
  }
}
