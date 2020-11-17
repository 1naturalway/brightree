<?php

namespace Brightree\Services;

class ReferenceDataService {

  use \Brightree\Traits\ApiTrait;

  private $params;
  private $wsdl_path = "https://webservices.brightree.net/v0100-1904/ReferenceDataService/ReferenceDataService.svc?singleWsdl";

  function __construct($params) {
    $this->params = $params;
  }

  public function Custom($method, $referenceInformation)
  {
    return $this->ApiCall($method, $referenceInformation);
  }
}
