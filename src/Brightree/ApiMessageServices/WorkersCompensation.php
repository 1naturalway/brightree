<?php

namespace Brightree\ApiMessageServices;

class WorkersCompensation {
  public $ConditionEmploy;
  public $ConditionAuto;
  public $ConditionOther;
  public $AutoAccidentSate;
  public $OnsetDate;

  public function setConditionEmploy($ConditionEmploy) {
    $this->ConditionEmploy = $ConditionEmploy;

    return $this;
  }

  public function setConditionAuto($ConditionAuto) {
    $this->ConditionAuto = $ConditionAuto;
    return $this;
  }

  public function setConditionOther($ConditionOther) {
    $this->ConditionOther = $ConditionOther;
    return $this;
  }

  public function setAutoAccidentSate($AutoAccidentSate) {
    $this->AutoAccidentSate = $AutoAccidentSate;
    return $this;
  }

  public function setOnsetDate($OnsetDate) {
    $this->OnsetDate = $OnsetDate;
    return $this;
  }
}
