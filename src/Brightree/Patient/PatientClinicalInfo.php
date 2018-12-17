<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\ICDCodeInfo;
use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\Referral;
use Brightree\ApiMessageServices\DoctorInfo;

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
  public $RenderingProvdier; //Not sure what this is
  public $Weight;

  public function __construct() {
    $this->DiagnosisCodes = new ICDCodeInfo();
    $this->FunctionalAbility = new LookupValue();
    $this->MarketingReferral = new Referral();
    $this->MarketingRep = new LookupValue();
    $this->OrderingDoctor = new DoctorInfo();
    $this->PrimaryDoctor = new DoctorInfo();
  }

  public function setDateOfDeath($DateOfDeath) {
    $this->DateOfDeath = $DateOfDeath;
    return $this;
  }

  public function getDiagnosisCodes(ICDCodeInfo $info) {
    return $this->DiagnosisCodes = $info;
  }

  public function getFunctionalAbility(LookupValue $ability) {
    return $this->FunctionalAbility = $ability;
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

  public function getMarketingReferral(Referral $referral) {
    return $this->MarketingReferral = $referral;
  }

  public function getMarketingRep(LookupValue $rep) {
    return $this->MarketingRep = $rep;
  }

  public function getOrderingDoctor(DoctorInfo $ordering) {
    return $this->OrderingDoctor = $ordering;
  }

  public function getPatientCondition() {
    return $this->PatientCondition;
  }

  public function getPractitioner() {
    return $this->Practitioner;
  }

  public function getPrimaryDoctor(DoctorInfo $primary) {
    return $this->PrimaryDoctor = $primary;
  }

  public function getRenderingProvdier() {
    return $this->RenderingProvdier;
  }

  public function setWeight($Weight) {
    $this->Weight = $Weight;
    return $this;
  }
}
