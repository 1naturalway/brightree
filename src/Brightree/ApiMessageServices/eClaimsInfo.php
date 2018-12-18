<?php

namespace Brightree\ApiMessageServices;

class eClaimsInfo {
  public $AttachmentNumber;
  public $TransCode;
  public $TypeCode;
  public $eClaimsAttachment;

  public function setAttachmentNumber($AttachmentNumber) {
    $this->AttachmentNumber = $AttachmentNumber;
    return $this;
  }

  public function setTransCode($TransCode) {
    $this->TransCode = $TransCode;
    return $this;
  }

  public function setTypeCode($TypeCode) {
    $this->TypeCode = $TypeCode;
    return $this;
  }

  public function setEClaimsAttachment($eClaimsAttachment) {
    $this->eClaimsAttachment = $eClaimsAttachment;
    return $this;
  }
}
