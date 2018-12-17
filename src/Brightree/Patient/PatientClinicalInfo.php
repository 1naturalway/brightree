<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\ICDCodeInfo;
use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\Referral;
use Brightree\ApiMessageServices\DoctorInfo;
use Brightree\ApiMessageServices\RenderingProvider;

class PatientClinicalInfo {
  public $DateOfDeath;
  public $DiagnosisCodes;
  public $FunctionalAbility;
  public $Gender;
  public $Height;
  public $InfectiousCondition;
  public $MarketingReferral;
  public $MarketingRep;
  public $OrderingDoctor;
  public $PatientCondition; // Not sure what this is
  public $Practitioner;
  public $PrimaryDoctor;
  public $RenderingProvider;
  public $Weight;

  public function __construct() {
    $this->DiagnosisCodes = new ICDCodeInfo();
    $this->FunctionalAbility = new LookupValue();
    $this->MarketingReferral = new Referral();
    $this->MarketingRep = new LookupValue();
    $this->OrderingDoctor = new DoctorInfo();
    $this->PrimaryDoctor = new DoctorInfo();
    $this->RenderingProvider = new RenderingProvider();
  }

  public function setDateOfDeath($DateOfDeath) {
    $this->DateOfDeath = $DateOfDeath;
    return $this;
  }

  public function getDiagnosisCodes() {
    return $this->DiagnosisCodes;
  }

  public function getFunctionalAbility() {
    return $this->FunctionalAbility;
  }

  public function setGender($Gender) {
    $this->Gender = $Gender;
    return $this;
  }

  public function setHeight($Height) {
    $this->Height = $Height;
    return $this;
  }

  public function setInfectiousCondition($InfectiousCondition) {
    $this->InfectiousCondition = $InfectiousCondition;
    return $this;
  }

  public function getMarketingReferral() {
    return $this->MarketingReferral;
  }

  public function getMarketingRep() {
    return $this->MarketingRep;
  }

  public function getOrderingDoctor() {
    return $this->OrderingDoctor;
  }

  public function getPatientCondition() {
    return $this->PatientCondition;
  }

  public function getPractitioner() {
    return $this->Practitioner;
  }

  public function getPrimaryDoctor() {
    return $this->PrimaryDoctor;
  }

  public function getRenderingProvider() {
    return $this->RenderingProvider;
  }

  public function setWeight($Weight) {
    $this->Weight = $Weight;
    return $this;
  }
}
