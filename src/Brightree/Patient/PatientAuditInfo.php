<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;

class PatientAuditInfo {
  public LookupValue $CreatedBy;

  public ?string $CreatedDate = null;

  public ?string $EmergencyContactConcurrencyUpdateTime = null;

  public ?string $Pt_ConcurrencyUpdateDateTime = null;

  public ?string $ResponsiblePartyConcurrencyUpdateTime = null;

  public function __construct() {
    $this->CreatedBy = new LookupValue();
  }

  public function getCreatedBy(LookupValue $createdBy): LookupValue {
    return $this->CreatedBy = $createdBy;
  }

  public function setCreatedDate(?string $CreatedDate): self {
    $this->CreatedDate = $CreatedDate;
    return $this;
  }

  public function setEmergencyContactConcurrencyUpdateTime(?string $EmergencyContactConcurrencyUpdateTime): self {
    $this->EmergencyContactConcurrencyUpdateTime = $EmergencyContactConcurrencyUpdateTime;
    return $this;
  }

  public function setPt_ConcurrencyUpdateDateTime(?string $Pt_ConcurrencyUpdateDateTime): self {
    $this->Pt_ConcurrencyUpdateDateTime = $Pt_ConcurrencyUpdateDateTime;
    return $this;
  }

  public function setResponsiblePartyConcurrencyUpdateTime(?string $ResponsiblePartyConcurrencyUpdateTime): self {
    $this->ResponsiblePartyConcurrencyUpdateTime = $ResponsiblePartyConcurrencyUpdateTime;
    return $this;
  }
}
