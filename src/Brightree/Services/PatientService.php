<?php

namespace Brightree\Services;

use Brightree\Patient\Patient;
use Brightree\Services\BaseService;

class PatientService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2006/OrderEntryService/patientservice.svc?singleWsdl";
  }

  public function patientFetchbyBrightreeID($BrightreeID) {
    return $this->apiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $BrightreeID]);
  }

  public function patientCreate(Patient $Patient) {
    return $this->apiCall('PatientCreate', ['Patient' => $Patient]);
  }

  public function patientUpdate(Patient $Patient, $BrightreeID) {
    return $this->apiCall('PatientUpdate', [
      'Patient' => $Patient,
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function patientPayorAdd($PatientKey, $PatientPayor) {
    return $this->apiCall('PatientPayorAdd', [
      'PatientKey' => $PatientKey,
      'PayorKey' => $PatientPayor->PayorKey,
      'PatientPayor' => $PatientPayor
    ]);
  }

  public function patientPayorUpdate($BrightreeID, $PatientPayor) {
    return $this->apiCall('PatientPayorUpdate', [
      'BrightreeID' => $BrightreeID,
      'PatientPayor' => $PatientPayor
    ]);
  }

  public function patientPayorFetch($PatientKey, $PayorKey) {
    return $this->apiCall('PatientPayorFetch', [
      'PatientKey' => $PatientKey,
      'PayorKey' => $PayorKey
    ]);
  }

  public function patientPayorFetchAll($PatientKey) {
    return $this->apiCall('PatientPayorFetchAll', ['PatientKey' => $PatientKey]);
  }

  public function patientPayorInfo($BrightreeID) {
    $patient = $this->apiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $BrightreeID]);
    return $patient->PatientFetchByBrightreeIDResult->Items->Patient->PatientInsuranceInfo->Payors->PatientPayorInfo;
  }

  public function patientSearch($PatientSearchRequest) {
    return $this->apiCall('PatientSearch', $PatientSearchRequest);
  }
}
