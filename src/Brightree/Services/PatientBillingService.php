<?php

namespace Brightree\Services;

class PatientBillingService {

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1909/InvoiceService/InvoiceService.svc?singleWsdl";
  }

  public function Custom($method, $invoiceInformation)
  {
    return $this->ApiCall($method, $invoiceInformation);
  }
}
