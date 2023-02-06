<?php

namespace Brightree\ApiMessageServices;

class ICDCodeInfo {
  public string $ICDCode;

  public string $Description;

  public $Sequence = 1;

  public bool $SelectedForUse;

  public $DiagType;

  public function setICDCode($ICDCode) {
    $this->ICDCode = $ICDCode;
    return $this;
  }

  public function setDescription($Description) {
    $this->Description = $Description;
    return $this;
  }

  public function setSequence($Sequence) {
    $this->Sequence = $Sequence;
    return $this;
  }

  public function setSelectedForUse($SelectedForUse) {
    $this->SelectedForUse = $SelectedForUse;
    return $this;
  }

  public function setDiagType($DiagType) {
    $this->DiagType = $DiagType;
    return $this;
  }
}
