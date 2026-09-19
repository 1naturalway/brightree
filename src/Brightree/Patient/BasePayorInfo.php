<?php

namespace Brightree\Patient;

use Brightree\CommonServices\PayorPolicyInfo;

class BasePayorInfo {
  public ?string $payorLevel = null;

  public PayorPolicyInfo $payorPolicyInfo;

  public ?string $PayPercent = null;

  public function __construct() {
    $this->payorPolicyInfo = new PayorPolicyInfo();
  }

  public function setPayorLevel(?string $payorLevel): self {
    $this->payorLevel = $payorLevel;
    return $this;
  }

  public function getPayorPolicyInfo(PayorPolicyInfo $payorPolicyInfo): PayorPolicyInfo {
    return $this->payorPolicyInfo = $payorPolicyInfo;
  }

  public function setPayPercent(?string $PayPercent): self {
    $this->PayPercent = $PayPercent;
    return $this;
  }
}
