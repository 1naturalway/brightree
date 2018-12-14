<?php

namespace Brightree;

use Brightree\SalesOrder\Salesorder;
use SoapClient;

class OrderEntryService {
  private $params;
  private $wsdl_path = "https://webservices.brightree.net/v0100-1807/OrderEntryService/SalesOrderService.svc?singleWsdl";

  function __construct($params) {
    $this->params = $params;
  }

  public function apiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function createSalesOrder() {
    return new SalesOrder();
  }
}
