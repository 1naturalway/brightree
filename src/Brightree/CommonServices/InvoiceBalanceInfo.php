<?php

namespace Brightree\CommonServices;

class InvoiceBalanceInfo {
  public ?float $Adjustments = null;

  public ?float $Balance = null;

  public ?float $Payments = null;

  public ?float $TotalAllowed = null;

  public ?float $TotalCharge = null;

  public ?float $TotalTax = null;

  public function setAdjustments(?float $Adjustments): self {
    $this->Adjustments = $Adjustments;
    return $this;
  }

  public function setBalance(?float $Balance): self {
    $this->Balance = $Balance;
    return $this;
  }

  public function setPayments(?float $Payments): self {
    $this->Payments = $Payments;
    return $this;
  }

  public function setTotalAllowed(?float $TotalAllowed): self {
    $this->TotalAllowed = $TotalAllowed;
    return $this;
  }

  public function setTotalCharge(?float $TotalCharge): self {
    $this->TotalCharge = $TotalCharge;
    return $this;
  }

  public function setTotalTax(?float $TotalTax): self {
    $this->TotalTax = $TotalTax;
    return $this;
  }
}
