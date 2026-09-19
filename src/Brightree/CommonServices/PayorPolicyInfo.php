<?php

namespace Brightree\CommonServices;

class PayorPolicyInfo {
  public ?int $BrightreeID = null;

  public ?string $EffectiveDate = null;

  public ?string $EffectiveEndDate = null;

  public ?string $Fax = null;

  public ?string $GroupNumber = null;

  public ?string $Name = null;

  public ?string $PatientPayorKey = null;

  public ?string $Phone = null;

  public ?string $PolicyNumber = null;

  public ?bool $Verified = null;

  public function getName(Name $name): ?string {
    return $this->Name = $name;
  }

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setEffectiveDate(?string $EffectiveDate): self {
    $this->EffectiveDate = $EffectiveDate;
    return $this;
  }

  public function setEffectiveEndDate(?string $EffectiveEndDate): self {
    $this->EffectiveEndDate = $EffectiveEndDate;
    return $this;
  }

  public function setFax(?string $Fax): self {
    $this->Fax = $Fax;
    return $this;
  }

  public function setPatientPayorKey(?string $PatientPayorKey): self {
    $this->PatientPayorKey = $PatientPayorKey;
    return $this;
  }

  public function setPhone(?string $Phone): self {
    $this->Phone = $Phone;
    return $this;
  }

  public function setPolicyNumber(?string $PolicyNumber): self {
    $this->PolicyNumber = $PolicyNumber;
    return $this;
  }

  public function setVerified(?bool $Verified): self {
    $this->Verified = $Verified;
    return $this;
  }
}
