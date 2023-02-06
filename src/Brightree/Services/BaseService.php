<?php

namespace Brightree\Services;

use Brightree\Traits\ApiTrait;
use Brightree\Traits\CustomTrait;

class BaseService {
  use ApiTrait;
  use CustomTrait;

  public $params;

  public $wsdl_path;

  public function __construct($params) {
    $this->params = $params;
  }
}
