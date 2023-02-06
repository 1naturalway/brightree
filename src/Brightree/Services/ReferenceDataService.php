<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class ReferenceDataService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1904/ReferenceDataService/ReferenceDataService.svc?singleWsdl";
  }
}
