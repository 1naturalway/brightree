<?php

namespace Brightree\Services;

use Brightree\Traits\ApiTrait;
use Brightree\Traits\CustomTrait;

class BaseService {
  use ApiTrait;
  use CustomTrait;

  public array $params;

  public string $wsdl_path;

  public function __construct(array $params) {
    $this->params = $params;
  }
}
