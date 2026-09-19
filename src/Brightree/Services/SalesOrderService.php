<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;
use Brightree\SalesOrder\SalesOrder;
use Brightree\SalesOrder\SalesOrderInsuranceInfo;
use Brightree\SalesOrder\SalesOrderItemInfo;
use Brightree\ApiMessageServices\SOItemQuickAdd;
use Brightree\SalesOrder\SalesOrderPayorSearchRequest;
use Brightree\SalesOrder\ShippingTrackingInfo;

class SalesOrderService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/OrderEntryService/SalesOrderService.svc?singleWsdl";
  }

  public function salesOrderFetchByBrightreeID(?string $brightreeID): mixed {
    return $this->apiCall('SalesOrderFetchByBrightreeID', ['BrightreeID' => $brightreeID]);
  }

  public function salesOrderUpdateInsurance(?int $brightreeID, ?SalesOrderInsuranceInfo $SalesOrderInsuranceInfo): mixed {
    return $this->apiCall('SalesOrderUpdateInsurance', ['BrightreeID' => $brightreeID, 'SalesOrderInsuranceInfo' => $SalesOrderInsuranceInfo]);
  }

  public function salesOrderUpdate(?int $brightreeID, ?SalesOrder $SalesOrder): mixed {
    return $this->apiCall('SalesOrderUpdate', ['BrightreeID' => $brightreeID, 'SalesOrder' => $SalesOrder]);
  }

  public function salesOrderCreate(?SalesOrder $SalesOrder): mixed {
    return $this->apiCall('SalesOrderCreate', ['SalesOrder' => $SalesOrder]);
  }

  public function salesOrderConfirm(?int $BrightreeID): mixed {
    return $this->apiCall('SalesOrderConfirm', ['BrightreeID' => $BrightreeID]);
  }

  public function salesOrderQuickAddItem(?int $BrightreeID, ?SOItemQuickAdd $SOItemQuickAdd): mixed {
    return $this->apiCall('SalesOrderQuickAddItem', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderItemInfo' => $SOItemQuickAdd
    ]);
  }

  /**
   * Updates the payors on a sales order line item.
   *
   * Despite its name, the SalesOrderItemInfo element is typed
   * ArrayOfSalesOrderItemPayorInfo in the WSDL, so it takes payor rows, not
   * item rows. The element name is Brightree's and must stay as-is on the wire.
   *
   * @param SalesOrderItemPayorInfo[]|null $SalesOrderItemPayorInfo
   */
  public function salesOrderUpdateItemPayor(?int $BrightreeID, ?int $BrightreeDetailID, ?array $SalesOrderItemPayorInfo): mixed {
    return $this->apiCall('SalesOrderUpdateItemPayor', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SalesOrderItemInfo' => $SalesOrderItemPayorInfo
    ]);
  }

  public function salesOrderUpdateItem(?int $BrightreeID, ?int $BrightreeDetailID, ?SalesOrderItemInfo $SalesOrderItemInfo): mixed {
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
  public function salesOrderItemUpdateLotNumbers(int $BrightreeID, int $BrightreeDetailID, array $LotNumbers): mixed {
    return $this->apiCall('SalesOrderItemUpdateLotNumbers', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'LotNumbers' => $LotNumbers
    ]);
  }

  public function salesOrderUpdateWIPState(?int $BrightreeID, ?int $NewWIPStateID): mixed {
    return $this->apiCall('SalesOrderUpdateWIPState', [
      'BrightreeID' => $BrightreeID,
      'NewWIPStateID' => $NewWIPStateID
    ]);
  }

  public function brightSHIPSalesOrderAck(?int $soKey = null): mixed {
    return $this->apiCall('BrightSHIPSalesOrderAck', [
      'soKey' => $soKey
    ]);
  }

  public function brightShipSalesOrderFetch(?int $shippingCarrierKey = null, ?int $branchKey = null, ?int $locationKey = null): mixed {
    return $this->apiCall('BrightShipSalesOrderFetch', [
      'shippingCarrierKey' => $shippingCarrierKey,
      'branchKey' => $branchKey,
      'locationKey' => $locationKey
    ]);
  }

  public function orderImport(?string $orderType = null, ?string $orderData = null): mixed {
    return $this->apiCall('OrderImport', [
      'orderType' => $orderType,
      'orderData' => $orderData
    ]);
  }

  public function salesOrderAddDeliveryException(?int $BrightreeID = null, ?array $SalesOrderDeliveryException = null): mixed {
    return $this->apiCall('SalesOrderAddDeliveryException', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderDeliveryException' => $SalesOrderDeliveryException
    ]);
  }

  public function salesOrderAddMarketingReferral(?int $BrightreeID = null, ?int $BrightreeReferralID = null): mixed {
    return $this->apiCall('SalesOrderAddMarketingReferral', [
      'BrightreeID' => $BrightreeID,
      'BrightreeReferralID' => $BrightreeReferralID
    ]);
  }

  public function salesOrderEvaluateDropShip(?int $BrightreeID = null, ?int $VendorBrightreeID = null): mixed {
    return $this->apiCall('SalesOrderEvaluateDropShip', [
      'BrightreeID' => $BrightreeID,
      'VendorBrightreeID' => $VendorBrightreeID
    ]);
  }

  public function salesOrderEvaluateDropShipWithAccountNumber(?int $BrightreeID = null, ?int $VendorBrightreeID = null, ?string $accountNumber = null): mixed {
    return $this->apiCall('SalesOrderEvaluateDropShipWithAccountNumber', [
      'BrightreeID' => $BrightreeID,
      'VendorBrightreeID' => $VendorBrightreeID,
      'accountNumber' => $accountNumber
    ]);
  }

  public function salesOrderFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('SalesOrderFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function salesOrderFetchByPurchaseOrderID(?int $PurchaseOrderID = null): mixed {
    return $this->apiCall('SalesOrderFetchByPurchaseOrderID', [
      'PurchaseOrderID' => $PurchaseOrderID
    ]);
  }

  public function salesOrderFetchPendingByShippingCarrierKey(?int $shippingCarrierKey = null): mixed {
    return $this->apiCall('SalesOrderFetchPendingByShippingCarrierKey', [
      'shippingCarrierKey' => $shippingCarrierKey
    ]);
  }

  public function salesOrderFetchReadyforShipping(?int $ShippingStatusKey = null): mixed {
    return $this->apiCall('SalesOrderFetchReadyforShipping', [
      'ShippingStatusKey' => $ShippingStatusKey
    ]);
  }

  public function salesOrderItemAddDeliveryException(?int $BrightreeID = null, ?array $SalesOrderDeliveryException = null): mixed {
    return $this->apiCall('SalesOrderItemAddDeliveryException', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderDeliveryException' => $SalesOrderDeliveryException
    ]);
  }

  public function salesOrderItemPriceOptionFetchByBrightreeID(?int $BrightreeID = null, ?int $BrightreeDetailID = null): mixed {
    return $this->apiCall('SalesOrderItemPriceOptionFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID
    ]);
  }

  public function salesOrderItemReplaceGeneric(?int $BrightreeID = null, ?int $BrightreeDetailID = null, ?string $ReplacementItemID = null): mixed {
    return $this->apiCall('SalesOrderItemReplaceGeneric', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'ReplacementItemID' => $ReplacementItemID
    ]);
  }

  public function salesOrderItemUpdatePriceOption(?int $BrightreeID = null, ?int $BrightreeDetailID = null, ?int $PriceOption = null): mixed {
    return $this->apiCall('SalesOrderItemUpdatePriceOption', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'PriceOption' => $PriceOption
    ]);
  }

  public function salesOrderItemUpdateSerialNumbers(?int $BrightreeID = null, ?int $BrightreeDetailID = null, ?array $SerialNumbers = null): mixed {
    return $this->apiCall('SalesOrderItemUpdateSerialNumbers', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SerialNumbers' => $SerialNumbers
    ]);
  }

  public function salesOrderMessagesFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('SalesOrderMessagesFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function salesOrderOverrideValidationDetailMessage(?int $BrightreeID = null, ?int $BrightreeDetailID = null, ?string $MessageCode = null): mixed {
    return $this->apiCall('SalesOrderOverrideValidationDetailMessage', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'MessageCode' => $MessageCode
    ]);
  }

  public function salesOrderOverrideValidationHeaderMessage(?int $BrightreeID = null, ?string $MessageCode = null): mixed {
    return $this->apiCall('SalesOrderOverrideValidationHeaderMessage', [
      'BrightreeID' => $BrightreeID,
      'MessageCode' => $MessageCode
    ]);
  }

  public function salesOrderPayorSearch(?SalesOrderPayorSearchRequest $searchParams = null, ?array $sortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('SalesOrderPayorSearch', [
      'searchParams' => $searchParams,
      'sortParams' => $sortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function salesOrderQuickAddItemWithItemsDataReturn(?int $BrightreeID = null, ?SOItemQuickAdd $SalesOrderItemInfo = null): mixed {
    return $this->apiCall('SalesOrderQuickAddItemWithItemsDataReturn', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }

  public function salesOrderQuickAddItemWithLinkedPAR(?int $BrightreeID = null, mixed $SalesOrderItemInfo = null): mixed {
    return $this->apiCall('SalesOrderQuickAddItemWithLinkedPAR', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }

  public function salesOrderRemoveItem(?int $BrightreeID = null, ?int $BrightreeDetailID = null): mixed {
    return $this->apiCall('SalesOrderRemoveItem', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID
    ]);
  }

  public function salesOrderRemoveMarketingReferral(?int $BrightreeID = null): mixed {
    return $this->apiCall('SalesOrderRemoveMarketingReferral', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function salesOrderSearch(mixed $SearchParams = null, ?array $SortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('SalesOrderSearch', [
      'SearchParams' => $SearchParams,
      'SortParams' => $SortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function salesOrderSendPOD(?int $BrightreeID = null): mixed {
    return $this->apiCall('SalesOrderSendPOD', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function salesOrderSubmitDropShip(?int $BrightreeID = null, ?array $BrightreeDetailIDs = null, ?int $VendorBrightreeID = null, ?bool $OverridePriceWarnings = null, mixed $SalesOrderDropShipOptions = null): mixed {
    return $this->apiCall('SalesOrderSubmitDropShip', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailIDs' => $BrightreeDetailIDs,
      'VendorBrightreeID' => $VendorBrightreeID,
      'OverridePriceWarnings' => $OverridePriceWarnings,
      'SalesOrderDropShipOptions' => $SalesOrderDropShipOptions
    ]);
  }

  public function salesOrderTemplateCreate(mixed $SalesOrderTemplate = null): mixed {
    return $this->apiCall('SalesOrderTemplateCreate', [
      'SalesOrderTemplate' => $SalesOrderTemplate
    ]);
  }

  public function salesOrderTemplateCreateSalesOrder(?int $soTemplateKey = null): mixed {
    return $this->apiCall('SalesOrderTemplateCreateSalesOrder', [
      'soTemplateKey' => $soTemplateKey
    ]);
  }

  public function salesOrderTemplateDelete(?int $BrightreeID = null): mixed {
    return $this->apiCall('SalesOrderTemplateDelete', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function salesOrderTemplateFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('SalesOrderTemplateFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function salesOrderTemplateFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('SalesOrderTemplateFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function salesOrderTemplateItemFrequencyFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('SalesOrderTemplateItemFrequencyFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function salesOrderTemplateItemFrequencyUpdate(?int $BrightreeID = null, ?int $BrightreeDetailID = null, mixed $SalesOrderItemInfo = null): mixed {
    return $this->apiCall('SalesOrderTemplateItemFrequencyUpdate', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }

  public function salesOrderTemplateItemPriceOptionFetchByBrightreeID(?int $BrightreeID = null, ?int $BrightreeDetailID = null): mixed {
    return $this->apiCall('SalesOrderTemplateItemPriceOptionFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID
    ]);
  }

  public function salesOrderTemplateItemUpdatePriceOption(?int $BrightreeID = null, ?int $BrightreeDetailID = null, ?int $PriceOption = null): mixed {
    return $this->apiCall('SalesOrderTemplateItemUpdatePriceOption', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'PriceOption' => $PriceOption
    ]);
  }

  public function salesOrderTemplateQuickAddItem(?int $BrightreeID = null, ?SOItemQuickAdd $SalesOrderItemInfo = null): mixed {
    return $this->apiCall('SalesOrderTemplateQuickAddItem', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }

  public function salesOrderTemplateRemoveItem(?int $BrightreeID = null, ?int $BrightreeDetailID = null): mixed {
    return $this->apiCall('SalesOrderTemplateRemoveItem', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID
    ]);
  }

  public function salesOrderTemplateScheduleFetchBySOTemplateKey(?int $soTemplateKey = null): mixed {
    return $this->apiCall('SalesOrderTemplateScheduleFetchBySOTemplateKey', [
      'soTemplateKey' => $soTemplateKey
    ]);
  }

  public function salesOrderTemplateScheduleLogSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('SalesOrderTemplateScheduleLogSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function salesOrderTemplateScheduleSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('SalesOrderTemplateScheduleSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function salesOrderTemplateScheduleUpdate(?int $soTemplateKey = null, mixed $schedule = null): mixed {
    return $this->apiCall('SalesOrderTemplateScheduleUpdate', [
      'soTemplateKey' => $soTemplateKey,
      'schedule' => $schedule
    ]);
  }

  public function salesOrderTemplateSearch(mixed $SearchParams = null, ?array $SortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('SalesOrderTemplateSearch', [
      'SearchParams' => $SearchParams,
      'SortParams' => $SortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function salesOrderTemplateUpdate(?int $BrightreeID = null, mixed $SalesOrderTemplate = null): mixed {
    return $this->apiCall('SalesOrderTemplateUpdate', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderTemplate' => $SalesOrderTemplate
    ]);
  }

  public function salesOrderTemplateUpdateInsurance(?int $BrightreeID = null, ?SalesOrderInsuranceInfo $SalesOrderInsuranceInfo = null): mixed {
    return $this->apiCall('SalesOrderTemplateUpdateInsurance', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderInsuranceInfo' => $SalesOrderInsuranceInfo
    ]);
  }

  public function salesOrderTemplateUpdateItem(?int $BrightreeID = null, ?int $BrightreeDetailID = null, mixed $SalesOrderItemInfo = null): mixed {
    return $this->apiCall('SalesOrderTemplateUpdateItem', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }

  public function salesOrderTemplateUpdateItemPayor(?int $BrightreeTemplateID = null, ?int $BrightreeTemplateDetailID = null, ?array $SalesOrderTemplateItemInfo = null): mixed {
    return $this->apiCall('SalesOrderTemplateUpdateItemPayor', [
      'BrightreeTemplateID' => $BrightreeTemplateID,
      'BrightreeTemplateDetailID' => $BrightreeTemplateDetailID,
      'SalesOrderTemplateItemInfo' => $SalesOrderTemplateItemInfo
    ]);
  }

  public function salesOrderTemplateUpdateItemsWithDefaultPriceOption(?int $BrightreeID = null): mixed {
    return $this->apiCall('SalesOrderTemplateUpdateItemsWithDefaultPriceOption', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function salesOrderTemplateUpdateWIPState(?int $BrightreeID = null, ?int $NewWIPStateID = null, ?int $OverrideAssignedToID = null): mixed {
    return $this->apiCall('SalesOrderTemplateUpdateWIPState', [
      'BrightreeID' => $BrightreeID,
      'NewWIPStateID' => $NewWIPStateID,
      'OverrideAssignedToID' => $OverrideAssignedToID
    ]);
  }

  public function salesOrderUpdateItemGeneric(?int $BrightreeID = null, ?int $BrightreeDetailID = null, ?SalesOrderItemInfo $SalesOrderItemInfo = null): mixed {
    return $this->apiCall('SalesOrderUpdateItemGeneric', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SalesOrderItemInfo' => $SalesOrderItemInfo
    ]);
  }

  public function salesOrderUpdateItemNextBilling(?int $BrightreeID = null, ?int $BrightreeDetailID = null, mixed $SOItemNextBilling = null): mixed {
    return $this->apiCall('SalesOrderUpdateItemNextBilling', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'SOItemNextBilling' => $SOItemNextBilling
    ]);
  }

  public function salesOrderUpdateItemsWithDefaultPriceOption(?int $BrightreeID = null): mixed {
    return $this->apiCall('SalesOrderUpdateItemsWithDefaultPriceOption', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function salesOrderUpdatePODStatus(?int $BrightreeID = null, ?string $podStatus = null): mixed {
    return $this->apiCall('SalesOrderUpdatePODStatus', [
      'BrightreeID' => $BrightreeID,
      'podStatus' => $podStatus
    ]);
  }

  public function salesOrderUpdateTracking(?int $soKey = null, ?ShippingTrackingInfo $SalesOrderTrackingInfo = null): mixed {
    return $this->apiCall('SalesOrderUpdateTracking', [
      'soKey' => $soKey,
      'SalesOrderTrackingInfo' => $SalesOrderTrackingInfo
    ]);
  }

  public function salesOrderVoid(?int $BrightreeID = null, ?int $SalesOrderVoidReasonKey = null): mixed {
    return $this->apiCall('SalesOrderVoid', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderVoidReasonKey' => $SalesOrderVoidReasonKey
    ]);
  }

  public function salesOrderVoidSearch(mixed $searchParams = null, ?array $sortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('SalesOrderVoidSearch', [
      'searchParams' => $searchParams,
      'sortParams' => $sortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function searchWIPStatusWithUpdate(?int $CurrentWIPStateID = null, ?int $NewWIPStateID = null, mixed $searchParams = null, ?array $sortParams = null, ?int $batchLimit = null): mixed {
    return $this->apiCall('SearchWIPStatusWithUpdate', [
      'CurrentWIPStateID' => $CurrentWIPStateID,
      'NewWIPStateID' => $NewWIPStateID,
      'searchParams' => $searchParams,
      'sortParams' => $sortParams,
      'batchLimit' => $batchLimit
    ]);
  }

  public function stopReasonSalesOrderFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('StopReasonSalesOrderFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function stopReasonSalesOrderTemplateFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('StopReasonSalesOrderTemplateFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function stopReasonSalesOrderTemplateUpdate(?int $BrightreeID = null, mixed $StopReasonInput = null): mixed {
    return $this->apiCall('StopReasonSalesOrderTemplateUpdate', [
      'BrightreeID' => $BrightreeID,
      'StopReasonInput' => $StopReasonInput
    ]);
  }

  public function stopReasonSalesOrderUpdate(?int $BrightreeID = null, mixed $StopReasonInput = null): mixed {
    return $this->apiCall('StopReasonSalesOrderUpdate', [
      'BrightreeID' => $BrightreeID,
      'StopReasonInput' => $StopReasonInput
    ]);
  }

  public function salesOrderFulfillmentVendorsFetchAll(): mixed {
    return $this->apiCall('SalesOrderFulfillmentVendorsFetchAll', []);
  }

  public function stopReasonFetchAll(): mixed {
    return $this->apiCall('StopReasonFetchAll', []);
  }
}
