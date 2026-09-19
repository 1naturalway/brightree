<?php

namespace Brightree\CommonServices;

use Brightree\Enums\PayorLevel;

/**
 * Shared base for the payor-info types. The WSDL declares it in
 * Brightree.ExternalAPI.CanonicalObjects.Common, which is why it lives here
 * rather than alongside the patient types that were its first consumer.
 */
class BasePayorInfo {
  public PayorLevel|string|null $payorLevel = null;

  public PayorPolicyInfo $payorPolicyInfo;

  public ?string $PayPercent = null;

  public function __construct() {
    $this->payorPolicyInfo = new PayorPolicyInfo();
  }

  public function setPayorLevel(PayorLevel|string|null $payorLevel): self {
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
