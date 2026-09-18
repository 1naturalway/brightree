<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class SalesOrderService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/OrderEntryService/SalesOrderService.svc?singleWsdl";
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

  /**
   * Attaches lot numbers to a sales order item.
   *
   * SOItemQuickAdd carries no lot fields, so lot numbers are set in this follow up call
   * using the detail key SalesOrderQuickAddItem returns. The call replaces the item's lot
   * numbers outright, so it is safe to repeat.
   *
   * @param \Brightree\SalesOrder\LotNumberInfo[] $LotNumbers
   */
  public function salesOrderItemUpdateLotNumbers(int $BrightreeID, int $BrightreeDetailID, array $LotNumbers) {
    return $this->apiCall('SalesOrderItemUpdateLotNumbers', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'LotNumbers' => $LotNumbers
    ]);
  }

  public function salesOrderUpdateWIPState($BrightreeID, $NewWIPStateID) {
    return $this->apiCall('SalesOrderUpdateWIPState', [
      'BrightreeID' => $BrightreeID,
      'NewWIPStateID' => $NewWIPStateID
    ]);
  }
}
