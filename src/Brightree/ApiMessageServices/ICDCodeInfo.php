<?php

namespace Brightree\ApiMessageServices;

use Brightree\Enums\DiagType;

class ICDCodeInfo {
  public ?string $ICDCode = null;

  public ?string $Description = null;

  public ?int $Sequence = null;

  public ?bool $SelectedForUse = null;

  public DiagType|string|null $DiagType = null;

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

  public function setDiagType(DiagType|string|null $DiagType): self {
    $this->DiagType = $DiagType;
    return $this;
  }
}
