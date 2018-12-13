<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\ICDCodeInfo;
use Brightree\ApiMessageServices\DoctorInfo;
use Brightree\ApiMessageServices\PatientInfo;
use Brightree\ApiMessageServices\RenderingProvider;

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

  public function setOrderingDoctor(DoctorInfo $doctorInfo) {
    $this->OrderingDoctor = $cdoctorInfo;
  }

  public function setPatientInfo(PatientInfo $patientInfo) {
    $this->Patient = $patientInfo;
  }

  public function setRenderingProvider(RenderingProvider $renderingProvider) {
    $this->RenderingProvider = $renderingProvider;
  }
}
