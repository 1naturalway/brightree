<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class PickupExchangeService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/OrderEntryService/PickupExchangeService.svc?singleWsdl";
  }

  public function pickupExchangeAddAllRentalItems(?int $BrightreeID = null): mixed {
    return $this->apiCall('PickupExchangeAddAllRentalItems', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function pickupExchangeAddDeliveryException(?int $BrightreeID = null, ?array $PuExDeliveryException = null): mixed {
    return $this->apiCall('PickupExchangeAddDeliveryException', [
      'BrightreeID' => $BrightreeID,
      'PuExDeliveryException' => $PuExDeliveryException
    ]);
  }

  public function pickupExchangeAddPickupItem(?int $BrightreeID = null, ?int $SalesOrderBrightreeID = null, ?int $SalesOrderDetailBrightreeID = null, ?string $PickupType = null): mixed {
    return $this->apiCall('PickupExchangeAddPickupItem', [
      'BrightreeID' => $BrightreeID,
      'SalesOrderBrightreeID' => $SalesOrderBrightreeID,
      'SalesOrderDetailBrightreeID' => $SalesOrderDetailBrightreeID,
      'PickupType' => $PickupType
    ]);
  }

  public function pickupExchangeCancelPOD(?int $BrightreeID = null): mixed {
    return $this->apiCall('PickupExchangeCancelPOD', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function pickupExchangeConfirm(?int $BrightreeID = null, mixed $creditInvoiceReasons = null): mixed {
    return $this->apiCall('PickupExchangeConfirm', [
      'BrightreeID' => $BrightreeID,
      'creditInvoiceReasons' => $creditInvoiceReasons
    ]);
  }

  public function pickupExchangeCreate(?int $PatientBrightreeID = null, mixed $PickupExchange = null): mixed {
    return $this->apiCall('PickupExchangeCreate', [
      'PatientBrightreeID' => $PatientBrightreeID,
      'PickupExchange' => $PickupExchange
    ]);
  }

  public function pickupExchangeDelete(?int $BrightreeID = null): mixed {
    return $this->apiCall('PickupExchangeDelete', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function pickupExchangeFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('PickupExchangeFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function pickupExchangeFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('PickupExchangeFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function pickupExchangeItemAddDeliveryException(?int $BrightreeID = null, ?array $PuExItemDeliveryException = null): mixed {
    return $this->apiCall('PickupExchangeItemAddDeliveryException', [
      'BrightreeID' => $BrightreeID,
      'PuExItemDeliveryException' => $PuExItemDeliveryException
    ]);
  }

  public function pickupExchangeItemSpecifyExchangeItem(?int $BrightreeID = null, ?int $BrightreeDetailID = null, ?string $ItemId = null, mixed $Identifier = null): mixed {
    return $this->apiCall('PickupExchangeItemSpecifyExchangeItem', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'ItemId' => $ItemId,
      'Identifier' => $Identifier
    ]);
  }

  public function pickupExchangeMessagesFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('PickupExchangeMessagesFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function pickupExchangePayorSearch(mixed $searchParams = null, ?array $sortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('PickupExchangePayorSearch', [
      'searchParams' => $searchParams,
      'sortParams' => $sortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function pickupExchangeRemoveItem(?int $BrightreeID = null, ?int $BrightreeDetailID = null): mixed {
    return $this->apiCall('PickupExchangeRemoveItem', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID
    ]);
  }

  public function pickupExchangeSearch(mixed $searchParams = null, ?array $sortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('PickupExchangeSearch', [
      'searchParams' => $searchParams,
      'sortParams' => $sortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function pickupExchangeSendPOD(?int $BrightreeID = null, ?bool $rush = null): mixed {
    return $this->apiCall('PickupExchangeSendPOD', [
      'BrightreeID' => $BrightreeID,
      'rush' => $rush
    ]);
  }

  public function pickupExchangeUpdate(?int $BrightreeID = null, mixed $PickupExchange = null): mixed {
    return $this->apiCall('PickupExchangeUpdate', [
      'BrightreeID' => $BrightreeID,
      'PickupExchange' => $PickupExchange
    ]);
  }

  public function pickupExchangeUpdateItem(?int $BrightreeID = null, ?int $BrightreeDetailID = null, mixed $PickUpExchangeItem = null): mixed {
    return $this->apiCall('PickupExchangeUpdateItem', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDetailID' => $BrightreeDetailID,
      'PickUpExchangeItem' => $PickUpExchangeItem
    ]);
  }

  public function pickupExchangeUpdatePODStatus(?int $BrightreeID = null, ?string $podStatus = null): mixed {
    return $this->apiCall('PickupExchangeUpdatePODStatus', [
      'BrightreeID' => $BrightreeID,
      'podStatus' => $podStatus
    ]);
  }

  public function pickupExchangeUpdateWIPInfoFromTemplate(?int $BrightreeID = null, ?int $NewWIPStateKey = null): mixed {
    return $this->apiCall('PickupExchangeUpdateWIPInfoFromTemplate', [
      'BrightreeID' => $BrightreeID,
      'NewWIPStateKey' => $NewWIPStateKey
    ]);
  }

  public function pickupExchangeWIPStatesFetchAll(): mixed {
    return $this->apiCall('PickupExchangeWIPStatesFetchAll', []);
  }
}
