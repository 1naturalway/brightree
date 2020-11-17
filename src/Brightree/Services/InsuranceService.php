<?php

namespace Brightree\Services;

class InsuranceService {

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2006/OrderEntryService/InsuranceService.svc?singleWsdl";
  }

  public function Custom($method, $insuranceInformation)
  {
    return $this->ApiCall($method, $insuranceInformation);
  }
}
