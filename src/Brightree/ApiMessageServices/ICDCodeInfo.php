<?php

namespace Brightree\ApiMessageServices;

class ICDCodeInfo {
  public $ICDCode;
  public $Description;
  public $Sequence = 1;
  public $SeletedForUse;
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

  public function setSeletedForUse($SeletedForUse) {
    $this->SeletedForUse = $SeletedForUse;
    return $this;
  }

  public function setDiagType($DiagType){
    $this->DiagType = $DiagType;
    return $this;
  }
}
