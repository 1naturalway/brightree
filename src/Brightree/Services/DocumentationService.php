<?php

namespace Brightree\Services;

class DocumentationService{

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2001/DocumentationService/DocumentationService.svc?singleWsdl";
  }
}
