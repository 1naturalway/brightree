<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class SalesOrderService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2406/OrderEntryService/SalesOrderService.svc?singleWsdl";
  }

  public function salesOrderFetchByBrightreeID($brightreeID) {
    return $this->apiCall('SalesOrderFetchByBrightreeID', ['BrightreeID' => $brightreeID]);
  }

  public function salesOrderUpdateInsurance($brightreeID, $SalesOrderInsuranceInfo) {
    return $this->apiCall('SalesOrderUpdateInsurance', ['BrightreeID' => $brightreeID, 'SalesOrderInsuranceInfo' => $SalesOrderInsuranceInfo]);
  }

  public function salesOrderUpdate($brightreeID, $SalesOrder) {
    return $this->apiCall('SalesOrderUpdate', ['BrightreeID' => $brightreeID, 'SalesOrder' => $SalesOrder]);
  }

  public function salesOrderCreate($SalesOrder) {
    return $this->apiCall('SalesOrderCreate', ['SalesOrder' => $SalesOrder]);
  }

  public function salesOrderConfirm($BrightreeID) {
    return $this->apiCall('SalesOrderConfirm', ['BrightreeID' => $BrightreeID]);
  }

  public function salesOrderQuickAddItem($BrightreeID, $SOItemQuickAdd) {
    return $this->apiCall('SalesOrderQuickAddItem', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderItemInfo' => $SOItemQuickAdd
    ]);
  }

  public function salesOrderUpdateItemPayor($BrightreeID, $BrightreeDetailID, $SalesOrderItemInfo) {
    return $this->apiCall('SalesOrderUpdateItemPayor', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }

  public function salesOrderUpdateItem($BrightreeID, $BrightreeDetailID, $SalesOrderItemInfo) {
    return $this->apiCall('SalesOrderUpdateItem', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }

  public function salesOrderUpdateWIPState($BrightreeID, $NewWIPStateID) {
    return $this->apiCall('SalesOrderUpdateWIPState', [
      'BrightreeID' => $BrightreeID,
      'NewWIPStateID' => $NewWIPStateID
    ]);
  }
}
