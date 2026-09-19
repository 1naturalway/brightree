<?php

namespace Brightree\Traits;

trait CustomTrait {
  use ApiTrait;

  public function custom(string $service, mixed $object): mixed {
    return $this->apiCall($service, $object);
  }
}
