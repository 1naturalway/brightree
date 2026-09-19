<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\eClaimsInfo;
use Brightree\ApiMessageServices\WorkersCompensation;

class SalesOrderInsuranceInfo {
  public ?bool $CoverageVerified = null;

  public ?bool $InsuranceVerified = null;

  public Payors $Payors;

  public eClaimsInfo $eClaimsInfo;

  public workersCompensation $workersCompensation;

  public ?bool $SignatureGeneratedByProvider = null;

  public function __construct() {
    $this->Payors = new Payors();
    $this->eClaimsInfo = new eClaimsInfo();
    $this->workersCompensation = new workersCompensation();
  }

  public function getPayors(Payors $payors): Payors {
    return $this->Payors = $payors;
  }

  public function getEClaimsInfo(eClaimsInfo $info): eClaimsInfo {
    return $this->eClaimsInfo = $info;
  }

  public function getWorkersCompensation(workersCompensation $workersComp): WorkersCompensation {
    return $this->workersCompensation = $workersComp;
  }

  public function setCoverageVerified(?bool $CoverageVerified): self {
    $this->CoverageVerified = $CoverageVerified;
    return $this;
  }

  public function setInsuranceVerified(?bool $InsuranceVerified): self {
    $this->InsuranceVerified = $InsuranceVerified;
    return $this;
  }

  public function setSignatureGeneratedByProvider(?bool $SignatureGeneratedByProvider): self {
    $this->SignatureGeneratedByProvider = $SignatureGeneratedByProvider;
    return $this;
  }
}
