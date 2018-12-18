<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;

class PatientAuditInfo {
  public $CreatedBy;
  public $CreatedDate;
  public $EmergencyContactConcurrencyUpdateTime;
  public $Pt_ConcurrencyUpdateDateTime;
  public $ResponsiblePartyConcurrencyUpdateTime;

  public function __construct() {
    $this->CreatedBy = new LookupValue();
  }

  public function getCreatedBy() {
    return $this->CreatedBy = $createdBy;
  }

  public function setCreateDt($CreatedDate) {
    $this->CreatedDate = $CreatedDate;
    return $this;
  }

  public function setEmergencyContactConcurrencyUpdateTime($EmergencyContactConcurrencyUpdateTime) {
    $this->EmergencyContactConcurrencyUpdateTime = $EmergencyContactConcurrencyUpdateTime;
    return $this;
  }

  public function setPt_ConcurrencyUpdateDateTime($Pt_ConcurrencyUpdateDateTime) {
    $this->Pt_ConcurrencyUpdateDateTime = $Pt_ConcurrencyUpdateDateTime;
    return $this;
  }

  public function setResponsiblePartyConcurrencyUpdateTime($ResponsiblePartyConcurrencyUpdateTime) {
    $this->ResponsiblePartyConcurrencyUpdateTime = $ResponsiblePartyConcurrencyUpdateTime;
    return $this;
  }
}
