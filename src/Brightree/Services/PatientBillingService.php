<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class PatientBillingService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1909/InvoiceService/InvoiceService.svc?singleWsdl";
  }
}
