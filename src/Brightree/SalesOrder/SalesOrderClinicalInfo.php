<?php

namespace Brightree\SalesOrder\SalesOrderClinicalInfo;

use Brightree\ApiMessageServices\ICDCodeInfo;
use Brightree\ApiMessageServices\DoctorInfo;
use Brighttree\ApiMessageServices\PatientInfo;

class SalesOrderClinicalInfo {
  public $DiagnosisCodes;
  public $EPSDTCertificationCodeIndicator;
  public $EPSDTConditionCode;
  public $MarketingReferral;
  public $OrderingDoctor;
  public $Patient;
  public $RenderingProvider;
  public $SOHeight;
  public $SOWeight;

  public function setDiagnosisCodes(ICDCodeInfo $codes) {
    $this->DiagnosisCodes = $codes;
  }

<<<<<<< HEAD
  public function setEPSDTCertificationCodeIndicator(EPSDTCertificationCondInd $code) { //What is RenderingProvider
    $this->EPSDTCertificationCodeIndicators = $code;
=======
  public function setEPSDTCertificationCodeIndicator(EPSDTCertificationCondInd $code) {
    $this->EPSDTCertificationCodeIndicator = $code;
>>>>>>> d43e91c116db37993a73e80e6d473aac7b277df1
  }

  public function setOrderingDoctor(DoctorInfo $doctorInfo) {
    $this->OrderingDoctor = $cdoctorInfo;
  }

  public function setPatientInfo(PatientInfo $patientInfo) {
    $this->Patient = $patientInfo;
  }

  public function setRenderingProvider(RenderingProvider $renderingProvider) { //What is RenderingProvider
    $this->RenderingProvider = $renderingProvider;
  }
}
