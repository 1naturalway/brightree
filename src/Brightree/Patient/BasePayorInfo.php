<?php

namespace Brightree\Patient;

use Brightree\CommonServices\payorPolicyInfo;

class BasePayorInfo {
  public $PayorLevel;

  public $payorPolicyInfo;

  public $PayPercent;

  public function __construct() {
    $this->payorPolicyInfo = new payorPolicyInfo();
  }

  public function setPayorLevel($PayorLevel) {
    $this->PayorLevel = $PayorLevel;
    return $this;
  }

  public function getPayorPolicyInfo(payorPolicyInfo $payorPolicyInfo) {
    return $this->payorPolicyInfo = $payorPolicyInfo;
  }

  public function setPayPercent($PayPercent) {
    $this->PayPercent = $PayPercent;
    return $this;
  }
}
