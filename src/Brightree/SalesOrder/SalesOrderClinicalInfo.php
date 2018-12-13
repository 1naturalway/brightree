<?php

namespace Brightree\SalesOrderClinicalInfo;

class SalesOrderClinicalInfo {
  public $DiagnosisCodes;
  public $EPSDTCertificationCodeIndicator;
  public $EPSDTConditionCode;
  public $MarketingReferral;
  public $OrderingDoctor;
  public $Patient;
  public $RederingProvider;
  public $SOHeight;
  public $SOWeight;

  public function setDiagnosisCodes(ICDCodeInfo $codes) {
    $this->DiagnosisCodes = $codes;
  }

  public function setEPSDTCertificationCodeIndicator(EPSDTCertificationCondInd $code) {
    $this->EPSDTCertificationCodeIndicator = $code;
  }

  public function setOrderingDoctor(DoctorInfo $doctorInfo) {
    $this->OrderingDoctor = $cdoctorInfo;
  }

  public function setPatientInfo(PatientInfo $patientInfo) {
    $this->Patient = $patientInfo;
  }

  public function setRederingProvider(RederingProvider $rederingProvider) {
    $this->RenderingProvider = $rederingProvider;
  }
}
