<?php

namespace Brightree\Services;

use Brightree\OrderEntryService;
use Brightree\SalesOrder\SalesOrder;
use Brightree\ApiMessageServices\SOItemQuickAdd;


class SalesOrderService {

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1807/OrderEntryService/SalesOrderService.svc?singleWsdl";
  }

  public function SalesOrderFetchByBrightreeID($brightreeID) {
    return $this->ApiCall('SalesOrderFetchByBrightreeID', ['BrightreeID' => $brightreeID]);
  }

  public function SalesOrderUpdateInsurance($brightreeID, $SalesOrderInsuranceInfo) {
    return $this->ApiCall('SalesOrderUpdateInsurance', ['BrightreeID' => $brightreeID, 'SalesOrderInsuranceInfo' => $SalesOrderInsuranceInfo]);
  }

  public function SalesOrderUpdate($brightreeID, $SalesOrder) {
    return $this->ApiCall('SalesOrderUpdate', ['BrightreeID' => $brightreeID, 'SalesOrder' => $SalesOrder]);
  }

  public function SalesOrderCreate($SalesOrder) {
    return $this->ApiCall('SalesOrderCreate', ['SalesOrder' => $SalesOrder]);
  }

  public function SalesOrderConfirm($BrightreeID) {
    return $this->ApiCall('SalesOrderConfirm', ['BrightreeID' => $BrightreeID]);
  }

  public function SalesOrderQuickAddItem($BrightreeID, $SOItemQuickAdd) {
    return $this->ApiCall('SalesOrderQuickAddItem', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderItemInfo' => $SOItemQuickAdd
    ]);
  }

  public function SalesOrderUpdateItemPayor($BrightreeID, $BrightreeDetailID, $SalesOrderItemInfo) {
    return $this->ApiCall('SalesOrderUpdateItemPayor', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }
}
