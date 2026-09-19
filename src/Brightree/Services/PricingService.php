<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class PricingService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/InventoryService/PricingService.svc?singleWsdl";
  }

  public function priceCreateItem(?int $PriceTableBrightreeID = null, ?string $ProcCode = null, ?string $priceType = null, ?int $ItemBrightreeID = null): mixed {
    return $this->apiCall('PriceCreateItem', [
      'PriceTableBrightreeID' => $PriceTableBrightreeID,
      'ProcCode' => $ProcCode,
      'priceType' => $priceType,
      'ItemBrightreeID' => $ItemBrightreeID
    ]);
  }

  public function priceCreateStandard(?int $PriceTableBrightreeID = null, ?string $ProcCode = null, ?string $priceType = null): mixed {
    return $this->apiCall('PriceCreateStandard', [
      'PriceTableBrightreeID' => $PriceTableBrightreeID,
      'ProcCode' => $ProcCode,
      'priceType' => $priceType
    ]);
  }

  public function priceDetailCreate(?int $BrightreeID = null, mixed $PriceDtl = null): mixed {
    return $this->apiCall('PriceDetailCreate', [
      'BrightreeID' => $BrightreeID,
      'PriceDtl' => $PriceDtl
    ]);
  }

  public function priceDetailFetchByBrightreeDetailID(?int $BrightreeDetailID = null): mixed {
    return $this->apiCall('PriceDetailFetchByBrightreeDetailID', [
      'BrightreeDetailID' => $BrightreeDetailID
    ]);
  }

  public function priceDetailUpdate(?int $BrightreeID = null, ?int $BrightreeDtlID = null, mixed $PriceDtl = null): mixed {
    return $this->apiCall('PriceDetailUpdate', [
      'BrightreeID' => $BrightreeID,
      'BrightreeDtlID' => $BrightreeDtlID,
      'PriceDtl' => $PriceDtl
    ]);
  }

  public function priceFetch(?int $PriceTableBrightreeID = null, ?string $ProcCode = null, ?string $PriceType = null, ?int $ItemBrightreeID = null): mixed {
    return $this->apiCall('PriceFetch', [
      'PriceTableBrightreeID' => $PriceTableBrightreeID,
      'ProcCode' => $ProcCode,
      'PriceType' => $PriceType,
      'ItemBrightreeID' => $ItemBrightreeID
    ]);
  }

  public function transitionToStandardPricingbyItemKeys(?int $standardPriceKey = null, ?array $itemKey = null): mixed {
    return $this->apiCall('TransitionToStandardPricingbyItemKeys', [
      'standardPriceKey' => $standardPriceKey,
      'itemKey' => $itemKey
    ]);
  }

  public function cMNFormFetchAll(): mixed {
    return $this->apiCall('CMNFormFetchAll', []);
  }

  public function nonTaxReasonFetchAll(): mixed {
    return $this->apiCall('NonTaxReasonFetchAll', []);
  }

  public function ping(): mixed {
    return $this->apiCall('Ping', []);
  }

  public function priceOptionLetterTypeFetchAll(): mixed {
    return $this->apiCall('PriceOptionLetterTypeFetchAll', []);
  }

  public function priceTableFetchAll(): mixed {
    return $this->apiCall('PriceTableFetchAll', []);
  }
}
