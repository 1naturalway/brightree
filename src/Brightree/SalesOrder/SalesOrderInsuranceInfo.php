<?php

namespace Brightree\SalesOrder;

use Brightree\CommonServices\Payors;
use Brightree\ApiMessageServices\eClaimsInfo;
use Brightree\ApiMessageServices\WorkersCompensation;

class SalesOrderInsuranceInfo {
  public $CooverageVerified;
  public $InsuranceVerified;
  public $Payors;
  public $eClaimsInfo;
  public $workersCompensation;


  public function getPayors(Payors $payors) {
    return $this->Payors = $payors;
  }

  public function getEClaimsInfo(eClaimsInfo $info) {
    return $this->eClaimsInfo = $info;
  }

  public function getWorkersCompensation(workersCompensation $workersComp) {
    return $this->workersCompensation = $workersComp;
  }

  public function setCooverageVerified($CooverageVerified) {
    $this->CooverageVerified = $CooverageVerified;
    return $this;
  }

  public function setInsuranceVerified($InsuranceVerified) {
    $this->InsuranceVerified = $InsuranceVerified;
    return $this;
  }
}
