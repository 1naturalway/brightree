<?php

namespace Brightree\Patient;

class Patient {
  public int $BrightreeID;

  public string $ExternalID;

  public PatientAuditInfo $PatientAuditInfo;

  public PatientClinicalInfo $PatientClinicalInfo;

  public PatientGeneralInfo $PatientGeneralInfo;

  public PatientInsuranceInfo $PatientInsuranceInfo;

  public function __construct() {
    $this->PatientAuditInfo = new PatientAuditInfo();
    $this->PatientClinicalInfo = new PatientClinicalInfo();
    $this->PatientGeneralInfo = new PatientGeneralInfo();
    $this->PatientInsuranceInfo = new PatientInsuranceInfo();
  }

  public function setBrightreeID($BrightreeID): self {
    $this->BrightreeID = $BrightreeID;

    return $this;
  }

  public function setExternalID($ExternalID): self {
    $this->ExternalID = $ExternalID;

    return $this;
  }

  public function getPatientAuditInfo(PatientAuditInfo $Audit): PatientAuditInfo {
    return $this->PatientAuditInfo = $Audit;
  }

  public function getPatientClinicalInfo(PatientClinicalInfo $Clinical): PatientClinicalInfo {
    return $this->PatientClinicalInfo = $Clinical;
  }

  public function getPatientGeneralInfo(PatientGeneralInfo $General): PatientGeneralInfo {
    return $this->PatientGeneralInfo = $General;
  }

  public function getPatientInsuranceInfo(PatientInsuranceInfo $Insurance): PatientInsuranceInfo {
    return $this->PatientInsuranceInfo = $Insurance;
  }
}
