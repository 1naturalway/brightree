<?php

namespace Brightree\Services;

use Brighree\OrderEntryService;

class SalesOrderService extends OrderEntryService {
  public function __construct() {
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1807/OrderEntryService/SalesOrderService.svc?singleWsdl";
  }

  public function createSalesOrder() {
    return new SalesOrder();
  }
}
