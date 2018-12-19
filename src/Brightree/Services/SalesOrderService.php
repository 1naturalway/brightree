<?php

namespace Brightree\Services;

use Brighree\OrderEntryService;
use Brightree\SalesOrder\SalesOrder;
use SoapClient;

class SalesOrderService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1807/OrderEntryService/SalesOrderService.svc?singleWsdl";
  }

  public function apiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function CreateSalesOrder() {
    return new SalesOrder();
  }
}
