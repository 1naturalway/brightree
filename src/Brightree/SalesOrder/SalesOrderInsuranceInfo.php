<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\eClaimsInfo;
use Brightree\ApiMessageServices\WorkersCompensation;

class SalesOrderInsuranceInfo {
  public ?bool $CoverageVerified = null;

  public ?bool $InsuranceVerified = null;

  /** @var SalesOrderPayorInfo[] */
  public array $Payors = [];

  public eClaimsInfo $eClaimsInfo;

  public workersCompensation $workersCompensation;

  public ?bool $SignatureGeneratedByProvider = null;

  public function __construct() {
    $this->eClaimsInfo = new eClaimsInfo();
    $this->workersCompensation = new workersCompensation();
  }

  /**
   * @param SalesOrderPayorInfo[] $payors
   */
  public function setPayors(array $payors): self {
    $this->Payors = $payors;
    return $this;
  }

  public function addPayor(SalesOrderPayorInfo $payor): self {
    $this->Payors[] = $payor;
    return $this;
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
