<?php

namespace Brightree\SalesOrder;

use Brightree\CommonServices\payorPolicyInfo;

class SalesOrderPayorInfo {
  public $PayPercent;
  public $payorLevel;
  public $payorPolicyInfo;
  public $Box10d;
  public $Box19;
  public $Box24Ia;
  public $Box24Ja;
  public $Box24Jb;
  public $IncludeBox24Jb;
  public $IncludeOnSO;
  public $PayPercentEqualToZero;
  public $WaitForPreviousPayForBilling;

  public function __contruct() {
    $this->payorPolicyInfo = new payorPolicyInfo();
  }


  public function getPayorPolicyInfo(payorPolicyInfo $Info) {
    return $this->payorPolicyInfo = $Info;
  }

  public function setPayPercent($PayPercent) {
    $this->PayPercent = $PayPercent;
    return $this;
  }

  public function setPayorLevel($payorLevel) {
    $this->payorLevel = $payorLevel;
    return $this;
  }

  public function setBox10d($Box10d) {
    $this->Box10d = $Box10d;
    return $this;
  }

  public function setBox19($Box19) {
    $this->Box19 = $Box19;
    return $this;
  }

  public function setBox24Ia($Box24Ia) {
    $this->Box24Ia = $Box24Ia;
    return $this;
  }

  public function setBox24Ja($Box24Ja) {
    $this->Box24Ja = $Box24Ja;
    return $this;
  }

  public function setBox24Jb($Box24Jb) {
    $this->Box24Jb = $Box24Jb;
    return $this;
  }

  public function setIncludeBox24Jb($IncludeBox24Jb) {
    $this->IncludeBox24Jb = $IncludeBox24Jb;
    return $this;
  }

  public function setIncludeOnSO($IncludeOnSO) {
    $this->IncludeOnSO = $IncludeOnSO;
    return $this;
  }

  public function setPayPercentEqualToZero($PayPercentEqualToZero) {
    $this->PayPercentEqualToZero = $PayPercentEqualToZero;
    return $this;
  }

  public function setWaitForPreviousPayForBilling($WaitForPreviousPayForBilling) {
    $this->WaitForPreviousPayForBilling = $WaitForPreviousPayForBilling;
    return $this;
  }
}
