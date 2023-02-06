<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class InsuranceService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2006/OrderEntryService/InsuranceService.svc?singleWsdl";
  }
}
