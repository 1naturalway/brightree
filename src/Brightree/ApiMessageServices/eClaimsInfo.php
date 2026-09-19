<?php

namespace Brightree\ApiMessageServices;

class eClaimsInfo {
  public ?string $AttachmentNumber = null;

  public ?string $TransCode = null;

  public ?string $TypeCode = null;

  public ?bool $eClaimsAttachment = null;

  public function setAttachmentNumber(?string $AttachmentNumber): self {
    $this->AttachmentNumber = $AttachmentNumber;
    return $this;
  }

  public function setTransCode(?string $TransCode): self {
    $this->TransCode = $TransCode;
    return $this;
  }

  public function setTypeCode(?string $TypeCode): self {
    $this->TypeCode = $TypeCode;
    return $this;
  }

  public function setEClaimsAttachment(?bool $eClaimsAttachment): self {
    $this->eClaimsAttachment = $eClaimsAttachment;
    return $this;
  }
}
