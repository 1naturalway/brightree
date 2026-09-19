<?php

namespace Brightree\ApiMessageServices;

class ICDCodeInfo {
  public string $ICDCode;

  public string $Description;

  public ?int $Sequence = 1;

  public bool $SelectedForUse;

  public ?string $DiagType = null;

  public function setICDCode(string $ICDCode): self {
    $this->ICDCode = $ICDCode;
    return $this;
  }

  public function setDescription(string $Description): self {
    $this->Description = $Description;
    return $this;
  }

  public function setSequence(?int $Sequence): self {
    $this->Sequence = $Sequence;
    return $this;
  }

  public function setSelectedForUse(bool $SelectedForUse): self {
    $this->SelectedForUse = $SelectedForUse;
    return $this;
  }

  public function setDiagType(?string $DiagType): self {
    $this->DiagType = $DiagType;
    return $this;
  }
}
