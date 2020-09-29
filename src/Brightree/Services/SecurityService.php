<?php

namespace Brightree\Services;

class SecurityService {

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1906/SecurityService/UserSecurityService.svc?singleWsdl";
  }
}
