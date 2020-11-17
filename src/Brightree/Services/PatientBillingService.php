<?php

namespace Brightree\Services;

class PatientBillingService {

  use \Brightree\Traits\ApiTrait;
  use \Brightree\Traits\CustomTrait;


  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1909/InvoiceService/InvoiceService.svc?singleWsdl";
  }

}
