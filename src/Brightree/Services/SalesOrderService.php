<?php

namespace Brightree\Services;

use SoapClient;

class SalesOrderService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1807/OrderEntryService/SalesOrderService.svc?singleWsdl";
  }

  public function ApiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function SalesOrderCreate($SalesOrder) {
    return $this->ApiCall('SalesOrderCreate', ['SalesOrder' => $SalesOrder]);
  }

  public function SalesOrderConfirm($BrightreeID) {
    return $this->ApiCall('SalesOrderConfirm', ['BrightreeID' => $BrightreeID]);
  }

  public function SalesOrderQuickAddItem($BrightreeID, $SOItemQuickAdd) {
    return $this->ApiCall('SalesorderQuickAddItem', [
      'BrightreeID' => $BrightreeID,
      'SOItemQuickAdd' => $SOItemQuickAdd
    ]);
  }
}
