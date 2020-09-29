<?php

namespace Brightree\Services;

class PricingService {

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1908/InventoryService/PricingService.svc?singleWsdl";
  }
}
