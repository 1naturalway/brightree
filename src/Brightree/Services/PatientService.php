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

  public function PatientFetchbyBrightreeID($BrightreeID) {
    return $this->apiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $BrightreeID]);
  }

  public function PatientCreate(Patient $Patient) {
    return $this->apiCall('PatientCreate', ['Patient' => $Patient]);
  }

  public function PatientUpdate(Patient $Patient, $BrightreeID) {
    return $this->apiCall('PatientUpdate', [
      'BrightreeID' => $BrightreeID,
      'Patient' => $Patient
    ]);
  }

  public function PatientPayorInfo($BrightreeID) {
   $patient = $this->apiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $BrightreeID]);
   return $patient->PatientFetchByBrightreeIDResult->Items->Patient->PatientInsuranceInfo->Payors->PatientPayorInfo;
  }

  public function PatientPayorAdd($PatientPayor) {
    return $this->apiCall('PatientPayorAdd', [
      'PatientKey' => $PatientPayor->PatientKey,
      'PayorKey' => $PatientPayor->PayorKey,
      'PatientPayor' => $PatientPayor
    ]);
  }

  public function PatientPayorUpdate($BrightreeID, $PatientPayor) {
    return $this->apiCall('PatientPayorUpdate', [
      'BrightreeID' => $BrightreeID,
      'PatientPayor' => $PatientPayor
    ]);
  }

  public function PatientPayorFetch($PatientKey, $PayorKey) {
    return $this->apiCall('PatientPayorFetch', [
      'PatientKey' => $PatientKey,
      'PayorKey' => $PayorKey
    ]);
  }

  public function PatientPayorFetchAll($PatientKey) {
    return $this->apiCall('PatientPayorFetchAll', ['PatientKey' => $PatientKey]);
  }
}
