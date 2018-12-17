<?php

namespace Brightree\Patient;

class Patient {
  public $BrightreeID;
  public $ExternalID;
  public $PatientAuditInfo;
  public $PatientClinicalInfo;
  public $PatientGeneralInfo;
  public $PatientInsuranceInfo;

  public function __construct() {
    $this->PatientAuditInfo = new PatientAuditInfo;
    $this->PatientClinicalInfo = new PatientClinicalInfo;
    $this->PatientGeneralInfo = new PatientGeneralInfo;
    $this->PatientInsuranceInfo = new PatientInsuranceInfo;
  }

  public function setBrightreeID($BrightreeID) {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setExternalID($ExternalID) {
    $this->ExternalID = $ExternalID;
    return $this;
  }

  public function getPatientAuditInfo(PatientAuditInfo $Audit) {
    return $this->PatientAuditInfo = $Audit;
  }

  public function getPatientClinicalInfo(PatientClinicalInfo $Clinical) {
    return $this->PatientClinicalInfo = $Clinical;
  }

  public function getPatientGeneralInfo(PatientGeneralInfo $General) {
    return $this->PatientGeneralInfo = $General;
  }

  public function getPatientInsuranceInfo(PatientInsuranceInfo $Insurance) {
    return $this->PatientInsuranceInfo = $Insurance;
  }
}
