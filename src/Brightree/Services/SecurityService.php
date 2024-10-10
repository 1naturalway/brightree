<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class SecurityService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2407/SecurityService/UserSecurityService.svc?singleWsdl";
  }
}
