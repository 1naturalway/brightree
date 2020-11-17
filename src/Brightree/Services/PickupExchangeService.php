<?php

namespace Brightree\Services;

class PickupExchangeService {

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2007/OrderEntryService/PickupExchangeService.svc?singleWsdl";
  }

  public function Custom($method, $pickupExchangeInformation)
  {
    return $this->ApiCall($method, $pickupExchangeInformation);
  }
}
