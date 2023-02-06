<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class PickupExchangeService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2007/OrderEntryService/PickupExchangeService.svc?singleWsdl";
  }
}
