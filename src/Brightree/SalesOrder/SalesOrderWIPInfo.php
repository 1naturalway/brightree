<?php

namespace Brightree\SalesOrder;

class SalesOrderWIPInfo {
  public ?int $WIPAssignedToKey = null;

  public ?string $WIPAssignedToPerson = null;

  public ?string $WIPClosedDate = null;

  public ?bool $WIPCompleted = null;

  public ?string $WIPCreateDate = null;

  public ?int $WIPDaysInState = null;

  public ?string $WIPNeedDate = null;

  public ?int $WIPStateKey = null;

  public ?string $WIPStateName = null;

  public function setWIPAssignedToKey(?int $WIPAssignedToKey): self {
    $this->WIPAssignedToKey = $WIPAssignedToKey;
    return $this;
  }

  public function setWIPAssignedToPerson(?string $WIPAssignedToPerson): self {
    $this->WIPAssignedToPerson = $WIPAssignedToPerson;
    return $this;
  }

  public function setWIPClosedDate(?string $WIPClosedDate): self {
    $this->WIPClosedDate = $WIPClosedDate;
    return $this;
  }

  public function setWIPCompleted(?bool $WIPCompleted): self {
    $this->WIPCompleted = $WIPCompleted;
    return $this;
  }

  public function setWIPCreateDate(?string $WIPCreateDate): self {
    $this->WIPCreateDate = $WIPCreateDate;
    return $this;
  }

  public function setWIPDaysInState(?int $WIPDaysInState): self {
    $this->WIPDaysInState = $WIPDaysInState;
    return $this;
  }

  public function setWIPNeedDate(?string $WIPNeedDate): self {
    $this->WIPNeedDate = $WIPNeedDate;
    return $this;
  }

  public function setWIPStateKey(?int $WIPStateKey): self {
    $this->WIPStateKey = $WIPStateKey;
    return $this;
  }

  public function setWIPStateName(?string $WIPStateName): self {
    $this->WIPStateName = $WIPStateName;
    return $this;
  }
}
