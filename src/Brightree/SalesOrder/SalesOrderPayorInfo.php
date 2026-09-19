<?php

namespace Brightree\SalesOrder;

use Brightree\CommonServices\PayorPolicyInfo;

class SalesOrderPayorInfo {
  public ?string $PayPercent = null;

  public ?string $payorLevel = null;

  public PayorPolicyInfo $payorPolicyInfo;

  public ?string $Box10d = null;

  public ?string $Box19 = null;

  public ?string $Box24Ia = null;

  public ?string $Box24Ja = null;

  public ?string $Box24Jb = null;

  public ?bool $IncludeBox24Jb = null;

  public ?bool $IncludeOnSO = null;

  public ?bool $PayPercentEqualToZero = null;

  public ?bool $WaitForPreviousPayorForBilling = null;

  public function __construct() {
    $this->payorPolicyInfo = new PayorPolicyInfo();
  }

  public function getPayorPolicyInfo(PayorPolicyInfo $Info): PayorPolicyInfo {
    return $this->payorPolicyInfo = $Info;
  }

  public function setPayPercent(?string $PayPercent): self {
    $this->PayPercent = $PayPercent;
    return $this;
  }

  public function setPayorLevel(?string $payorLevel): self {
    $this->payorLevel = $payorLevel;
    return $this;
  }

  public function setBox10d(?string $Box10d): self {
    $this->Box10d = $Box10d;
    return $this;
  }

  public function setBox19(?string $Box19): self {
    $this->Box19 = $Box19;
    return $this;
  }

  public function setBox24Ia(?string $Box24Ia): self {
    $this->Box24Ia = $Box24Ia;
    return $this;
  }

  public function setBox24Ja(?string $Box24Ja): self {
    $this->Box24Ja = $Box24Ja;
    return $this;
  }

  public function setBox24Jb(?string $Box24Jb): self {
    $this->Box24Jb = $Box24Jb;
    return $this;
  }

  public function setIncludeBox24Jb(?bool $IncludeBox24Jb): self {
    $this->IncludeBox24Jb = $IncludeBox24Jb;
    return $this;
  }

  public function setIncludeOnSO(?bool $IncludeOnSO): self {
    $this->IncludeOnSO = $IncludeOnSO;
    return $this;
  }

  public function setPayPercentEqualToZero(?bool $PayPercentEqualToZero): self {
    $this->PayPercentEqualToZero = $PayPercentEqualToZero;
    return $this;
  }

  public function setWaitForPreviousPayorForBilling(?bool $WaitForPreviousPayorForBilling): self {
    $this->WaitForPreviousPayorForBilling = $WaitForPreviousPayorForBilling;
    return $this;
  }
}
