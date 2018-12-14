<?php

namespace Brightree\ApiMessageServices;

class LookupValue {
  public $ID;
  public $Value;

  public function setID($ID) {
    $this->ID = $ID;
    return $this;
  }

  public function setValue($Value) {
    $this->Value = $Value;
    return $this;
  }
}
