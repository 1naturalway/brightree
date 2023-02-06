<?php

namespace Brightree\CommonServices;

class Name {
  public $First;

  public $Last;

  public $Middle;

  public $Suffix;

  public $Title;

  public function setFirst($First) {
    $this->First = $First;
    return $this;
  }

  public function setLast($Last) {
    $this->Last = $Last;
    return $this;
  }

  public function setMiddle($Middle) {
    $this->Middle = $Middle;
    return $this;
  }

  public function setSuffix($Suffix) {
    $this->Suffix = $Suffix;
    return $this;
  }

  public function setTitle($Title) {
    $this->Title = $Title;
    return $this;
  }
}
