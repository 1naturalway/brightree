<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;

class PatientAuditInfo {
  public $CreatedBy;
  public $CreateDt;
  public $EmergencyContactConcurrencyUpdateTime;
  public $Pt_ConcurrencyUpdateDateTime;
  public $ResponsiblePartyConcurrencyUpdateTime;

  public function __construct() {
    $this->CreatedBy = new LookupValue();
  }

  public function getCreatedBy(LookupValue $createdBy) {
    return $this->CreatedBy = $createdBy;
  }

  public function setCreateDt($CreateDt) {
    $this->CreateDt = $CreateDt;
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
