<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Name;

class MarketingRep {
  public ?int $BrightreeID = null;

  public Name $Name;

  public function __construct() {
    $this->Name = new Name();
  }
}
