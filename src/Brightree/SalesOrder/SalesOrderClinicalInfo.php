<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\DoctorInfo;
use Brightree\ApiMessageServices\DiagnosisCodes;
use Brightree\ApiMessageServices\PatientInfo;
use Brightree\ApiMessageServices\RenderingProvider;
use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\Referral;

class SalesOrderClinicalInfo {
  public DiagnosisCodes $DiagnosisCodes;

  public ?string $EPSDTCertificationCodeIndicator = null;

  public LookupValue $EPSDTConditionCode;

  public ?Referral $MarketingReferral = null;

  public DoctorInfo $OrderingDoctor;

  public PatientInfo $Patient;

  public RenderingProvider $RenderingProvider;

  public ?float $SOHeight = null;

  public ?float $SOWeight = null;

  public function __construct() {
    $this->DiagnosisCodes = new DiagnosisCodes();
    $this->EPSDTConditionCode = new LookupValue();
    $this->OrderingDoctor = new DoctorInfo();
    $this->Patient = new PatientInfo();
    $this->RenderingProvider = new RenderingProvider();
  }

  public function setDiagnosisCodes(DiagnosisCodes $diagnosisCodes): void {
    $this->DiagnosisCodes = $diagnosisCodes;
  }

  public function setOrderingDoctor(DoctorInfo $doctorInfo): void {
    $this->OrderingDoctor = $doctorInfo;
  }

  public function setPatient(PatientInfo $patientInfo): void {
    $this->Patient = $patientInfo;
  }

  public function setRenderingProvider(RenderingProvider $renderingProvider): void {
    $this->RenderingProvider = $renderingProvider;
  }

  public function setEPSDTCertificationCodeIndicator(?string $EPSDTCertificationCodeIndicator): self {
    $this->EPSDTCertificationCodeIndicator = $EPSDTCertificationCodeIndicator;
    return $this;
  }

  public function setEPSDTConditionCode(LookupValue $EPSDTConditionCode): self {
    $this->EPSDTConditionCode = $EPSDTConditionCode;
    return $this;
  }

  public function setMarketingReferral(?Referral $MarketingReferral): self {
    $this->MarketingReferral = $MarketingReferral;
    return $this;
  }

  public function setSOHeight(?float $SOHeight): self {
    $this->SOHeight = $SOHeight;
    return $this;
  }

  public function setSOWeight(?float $SOWeight): self {
    $this->SOWeight = $SOWeight;
    return $this;
  }
}
