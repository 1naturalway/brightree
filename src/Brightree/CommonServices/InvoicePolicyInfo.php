<?php

namespace Brightree\CommonServices;

use Brightree\Enums\ClaimFormType;
use Brightree\Enums\SubmissionMethod;

/**
 * Extends BasePayorInfo, matching the WSDL where InvoicePolicyInfo derives from
 * it and so also carries payorLevel, payorPolicyInfo and PayPercent.
 */
class InvoicePolicyInfo extends BasePayorInfo {
  public ?string $AttachmentNumber = null;

  public ?string $Box10d = null;

  public ?string $Box19 = null;

  public ?string $Box24Ia = null;

  public ?string $Box24Ja = null;

  public ?string $Box24Jb = null;

  public ClaimFormType|string|null $ClaimFormType = null;

  public ?bool $IncludeBox24Jb = null;

  public ?bool $IncludeeClaimAttachment = null;

  public SubmissionMethod|string|null $SubmissionMethod = null;

  public function setAttachmentNumber(?string $AttachmentNumber): self {
    $this->AttachmentNumber = $AttachmentNumber;
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

  public function setClaimFormType(ClaimFormType|string|null $ClaimFormType): self {
    $this->ClaimFormType = $ClaimFormType;
    return $this;
  }

  public function setIncludeBox24Jb(?bool $IncludeBox24Jb): self {
    $this->IncludeBox24Jb = $IncludeBox24Jb;
    return $this;
  }

  public function setIncludeeClaimAttachment(?bool $IncludeeClaimAttachment): self {
    $this->IncludeeClaimAttachment = $IncludeeClaimAttachment;
    return $this;
  }

  public function setSubmissionMethod(SubmissionMethod|string|null $SubmissionMethod): self {
    $this->SubmissionMethod = $SubmissionMethod;
    return $this;
  }
}
