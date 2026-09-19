<?php

namespace Brightree\CommonServices;

class ContactInfo {
  public ?string $EmailAddress = null;

  public ?bool $ExcludeFaxService = null;

  public ?string $FaxAttention = null;

  public ?string $FaxNumber = null;

  public ?string $MobilePhoneNumber = null;

  public ?string $PhoneNumber = null;

  public function setPhoneNumber(?string $PhoneNumber): self {
    $this->PhoneNumber = $PhoneNumber;
    return $this;
  }

  public function setFaxNumber(?string $FaxNumber): self {
    $this->FaxNumber = $FaxNumber;
    return $this;
  }

  public function setFaxAttention(?string $FaxAttention): self {
    $this->FaxAttention = $FaxAttention;
    return $this;
  }

  public function setMobilePhoneNumber(?string $MobilePhoneNumber): self {
    $this->MobilePhoneNumber = $MobilePhoneNumber;
    return $this;
  }

  public function setEmailAddress(?string $EmailAddress): self {
    $this->EmailAddress = $EmailAddress;
    return $this;
  }

  public function setExcludeFaxService(?bool $ExcludeFaxService): self {
    $this->ExcludeFaxService = $ExcludeFaxService;
    return $this;
  }
}
