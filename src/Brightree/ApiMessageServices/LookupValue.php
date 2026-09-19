<?php

namespace Brightree\ApiMessageServices;

class LookupValue {
  public ?int $ID = null;

  public ?string $Value = null;

  public function setID(?int $ID): self {
    $this->ID = $ID;
    return $this;
  }

  public function setValue(?string $Value): self {
    $this->Value = $Value;
    return $this;
  }
}
