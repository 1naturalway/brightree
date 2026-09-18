<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class PricingService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/InventoryService/PricingService.svc?singleWsdl";
  }
}
