<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\DoctorInfo;
use Brightree\ApiMessageServices\ICDCodeInfo;
use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\PatientInfo;
use Brightree\ApiMessageServices\Referral;
use Brightree\ApiMessageServices\RenderingProvider;
use Brightree\Enums\EPSDTCertificationCondInd;

class SalesOrderClinicalInfo {
  /** @var ICDCodeInfo[] */
  public array $DiagnosisCodes = [];

  public EPSDTCertificationCondInd|string|null $EPSDTCertificationCodeIndicator = null;

  public LookupValue $EPSDTConditionCode;

  public ?Referral $MarketingReferral = null;

  public DoctorInfo $OrderingDoctor;

  public PatientInfo $Patient;

  public RenderingProvider $RenderingProvider;

  public ?float $SOHeight = null;

  public ?float $SOWeight = null;

  public function __construct() {
    $this->EPSDTConditionCode = new LookupValue();
    $this->OrderingDoctor = new DoctorInfo();
    $this->Patient = new PatientInfo();
    $this->RenderingProvider = new RenderingProvider();
  }

  /**
   * @param ICDCodeInfo[] $diagnosisCodes
   */
  public function setDiagnosisCodes(array $diagnosisCodes): void {
    $this->DiagnosisCodes = $diagnosisCodes;
  }

  public function addDiagnosisCode(ICDCodeInfo $diagnosisCode): self {
    $this->DiagnosisCodes[] = $diagnosisCode;
    return $this;
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

  public function setEPSDTCertificationCodeIndicator(EPSDTCertificationCondInd|string|null $EPSDTCertificationCodeIndicator): self {
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
