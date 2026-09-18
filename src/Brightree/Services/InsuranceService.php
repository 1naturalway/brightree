<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class InsuranceService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/OrderEntryService/InsuranceService.svc?singleWsdl";
  }
}
