<?php

namespace Brightree\ApiMessageServices;

class WorkersCompensation {
  public ?bool $ConditionEmploy = null;

  public ?bool $ConditionAuto = null;

  public ?bool $ConditionOther = null;

  public ?string $AutoAccidentState = null;

  public ?string $OnsetDate = null;

  public function setConditionEmploy(?bool $ConditionEmploy): self {
    $this->ConditionEmploy = $ConditionEmploy;

    return $this;
  }

  public function setConditionAuto(?bool $ConditionAuto): self {
    $this->ConditionAuto = $ConditionAuto;
    return $this;
  }

  public function setConditionOther(?bool $ConditionOther): self {
    $this->ConditionOther = $ConditionOther;
    return $this;
  }

  public function setAutoAccidentState(?string $AutoAccidentState): self {
    $this->AutoAccidentState = $AutoAccidentState;
    return $this;
  }

  public function setOnsetDate(?string $OnsetDate): self {
    $this->OnsetDate = $OnsetDate;
    return $this;
  }
}
