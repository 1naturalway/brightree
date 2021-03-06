<?php

namespace Brightree\Services;

class PickupExchangeService {

  use \Brightree\Traits\ApiTrait;
  use \Brightree\Traits\CustomTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2007/OrderEntryService/PickupExchangeService.svc?singleWsdl";
  }
}
