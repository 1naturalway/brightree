<?php

namespace Brightree\SalesOrder;

class SalesOrderWIPInfo {
  public $WIPAssignedToKey;

  public $WIPAssignedToPerson;

  public $WIPClosedDate;

  public $WIPCompleted;

  public $WIPCreateDate;

  public $WIPDaysInState;

  public $WIPNeedDate;

  public $WIPStateKey;

  public $WIPStateName;

  public function setWIPAssignedToKey($WIPAssignedToKey) {
    $this->WIPAssignedToKey = $WIPAssignedToKey;
    return $this;
  }

  public function setWIPAssignedToPerson($WIPAssignedToPerson) {
    $this->WIPAssignedToPerson = $WIPAssignedToPerson;
    return $this;
  }

  public function setWIPClosedDate($WIPClosedDate) {
    $this->WIPClosedDate = $WIPClosedDate;
    return $this;
  }

  public function setWIPCompleted($WIPCompleted) {
    $this->WIPCompleted = $WIPCompleted;
    return $this;
  }

  public function setWIPCreateDate($WIPCreateDate) {
    $this->WIPCreateDate = $WIPCreateDate;
    return $this;
  }

  public function setWIPDaysInState($WIPDaysInState) {
    $this->WIPDaysInState = $WIPDaysInState;
    return $this;
  }

  public function setWIPNeedDate($WIPNeedDate) {
    $this->WIPNeedDate = $WIPNeedDate;
    return $this;
  }

  public function setWIPStateKey($WIPStateKey) {
    $this->WIPStateKey = $WIPStateKey;
    return $this;
  }

  public function setWIPStateName($WIPStateName) {
    $this->WIPStateName = $WIPStateName;
    return $this;
  }
}
