<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\DoctorInfo;
use Brightree\ApiMessageServices\DiagnosisCodes;
use Brightree\ApiMessageServices\PatientInfo;
use Brightree\ApiMessageServices\RenderingProvider;
use Brightree\ApiMessageServices\LookupValue;

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

  public function __construct() {
    $this->DiagnosisCodes = new DiagnosisCodes();
    $this->EPSDTConditionCode = new LookupValue();
    $this->OrderingDoctor = new DoctorInfo();
    $this->Patient = new PatientInfo();
    $this->RenderingProvider = new RenderingProvider();
  }

  public function setDiagnosisCodes(DiagnosisCodes $diagnosisCodes) {
    $this->DiagnosisCodes = $diagnosisCodes;
  }

  public function setOrderingDoctor(DoctorInfo $doctorInfo) {
    $this->OrderingDoctor = $doctorInfo;
  }

  public function setPatientInfo(PatientInfo $patientInfo) {
    $this->Patient = $patientInfo;
  }

  public function setRenderingProvider(RenderingProvider $renderingProvider) {
    $this->RenderingProvider = $renderingProvider;
  }

  public function setEPSDTCertificationCodeIndicator($EPSDTCertificationCodeIndicator) {
    $this->EPSDTCertificationCodeIndicator = $EPSDTCertificationCodeIndicator;
    return $this;
  }

  public function setEPSDTConditionCode($EPSDTConditionCode) {
    $this->EPSDTConditionCode = $EPSDTConditionCode;
    return $this;
  }

  public function setMarketingReferral($MarketingReferral) {
    $this->MarketingReferral = $MarketingReferral;
    return $this;
  }

  public function setSOHeight($SOHeight) {
    $this->SOHeight = $SOHeight;
    return $this;
  }

  public function setSOWeight($SOWeight) {
    $this->SOWeight = $SOWeight;
    return $this;
  }
}
