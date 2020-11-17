<?php

namespace Brightree\Services;

class ReferenceDataService {

  use \Brightree\Traits\ApiTrait;
  use \Brightree\Traits\CustomTrait;


  private $params;
  private $wsdl_path = "https://webservices.brightree.net/v0100-1904/ReferenceDataService/ReferenceDataService.svc?singleWsdl";

  function __construct($params) {
    $this->params = $params;
  }

}
