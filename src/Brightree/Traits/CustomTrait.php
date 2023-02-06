<?php

namespace Brightree\Traits;

use Brightree\Traits\ApiTrait;

trait CustomTrait {
  use ApiTrait;

  public function custom($service, $object) {
    return $this->apiCall($service, $object);
  }
}
