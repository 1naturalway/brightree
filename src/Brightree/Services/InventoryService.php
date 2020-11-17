<?php

namespace Brightree\Services;

class InventoryService {

  use \Brightree\Traits\ApiTrait;
  use \Brightree\Traits\CustomTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2006/InventoryService/InventoryService.svc?singleWsdl";
  }
}
