<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class DocumentationService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2004/DocumentationService/DocumentationService.svc?singleWsdl";
  }
}
