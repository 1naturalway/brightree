<?php

namespace Brightree\Services;

use Brightree\Patient\Patient;

class PatientService {

  use \Brightree\Traits\ApiTrait;
  use \Brightree\Traits\CustomTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2006/OrderEntryService/patientservice.svc?singleWsdl";
  }

  public function PatientFetchbyBrightreeID($BrightreeID) {
    return $this->ApiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $BrightreeID]);
  }

  public function PatientCreate(Patient $Patient) {
    return $this->ApiCall('PatientCreate', ['Patient' => $Patient]);
  }

  public function PatientUpdate(Patient $Patient, $BrightreeID) {
    return $this->ApiCall('PatientUpdate', [
      'Patient' => $Patient,
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function PatientPayorAdd($PatientPayor) {
    return $this->ApiCall('PatientPayorAdd', [
      'PatientKey' => $PatientPayor->PatientKey,
      'PayorKey' => $PatientPayor->PayorKey,
      'PatientPayor' => $PatientPayor
    ]);
  }

  public function PatientPayorUpdate($BrightreeID, $PatientPayor) {
    return $this->ApiCall('PatientPayorUpdate', [
      'BrightreeID' => $BrightreeID,
      'PatientPayor' => $PatientPayor
    ]);
  }

  public function PatientPayorFetch($PatientKey, $PayorKey) {
    return $this->ApiCall('PatientPayorFetch', [
      'PatientKey' => $PatientKey,
      'PayorKey' => $PayorKey
    ]);
  }

  public function PatientPayorFetchAll($PatientKey) {
    return $this->ApiCall('PatientPayorFetchAll', ['PatientKey' => $PatientKey]);
  }

  public function PatientPayorInfo($BrightreeID) {
    $patient = $this->ApiCall('PatientFetchbyBrightreeID', ['BrightreeID' => $BrightreeID]);
    return $patient->PatientFetchByBrightreeIDResult->Items->Patient->PatientInsuranceInfo->Payors->PatientPayorInfo;
  }
}
