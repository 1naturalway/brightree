<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;
use Brightree\SalesOrder\ShippingTrackingInfo;

class InventoryService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2606/InventoryService/InventoryService.svc?singleWsdl";
  }

  public function itemFetchByItemID(?string $ItemID): mixed {
    return $this->apiCall('ItemFetchByItemID', ['ItemID' => $ItemID]);
  }

  public function fetchItemLocations(?int $ItemBrightreeId = null): mixed {
    return $this->apiCall('FetchItemLocations', [
      'ItemBrightreeId' => $ItemBrightreeId
    ]);
  }

  public function fetchItemQuantitiesAtLocation(?int $ItemBrightreeId = null, ?int $LocationBrightreeId = null): mixed {
    return $this->apiCall('FetchItemQuantitiesAtLocation', [
      'ItemBrightreeId' => $ItemBrightreeId,
      'LocationBrightreeId' => $LocationBrightreeId
    ]);
  }

  public function inventoryItemAddLots(?int $ItemBrightreeID = null, mixed $transInfo = null, ?array $transDetails = null): mixed {
    return $this->apiCall('InventoryItemAddLots', [
      'ItemBrightreeID' => $ItemBrightreeID,
      'transInfo' => $transInfo,
      'transDetails' => $transDetails
    ]);
  }

  public function inventoryItemAddSerialNumbers(?int $ItemBrightreeID = null, mixed $transInfo = null, ?array $transDetails = null): mixed {
    return $this->apiCall('InventoryItemAddSerialNumbers', [
      'ItemBrightreeID' => $ItemBrightreeID,
      'transInfo' => $transInfo,
      'transDetails' => $transDetails
    ]);
  }

  public function inventoryItemAdjustment(?int $ItemBrightreeID = null, mixed $transInfo = null, ?array $transDetails = null): mixed {
    return $this->apiCall('InventoryItemAdjustment', [
      'ItemBrightreeID' => $ItemBrightreeID,
      'transInfo' => $transInfo,
      'transDetails' => $transDetails
    ]);
  }

  public function inventoryItemTransfer(?int $ItemBrightreeID = null, mixed $transInfo = null, ?array $transDetails = null): mixed {
    return $this->apiCall('InventoryItemTransfer', [
      'ItemBrightreeID' => $ItemBrightreeID,
      'transInfo' => $transInfo,
      'transDetails' => $transDetails
    ]);
  }

  public function itemAddToLocation(?int $ItemBrightreeID = null, mixed $location = null): mixed {
    return $this->apiCall('ItemAddToLocation', [
      'ItemBrightreeID' => $ItemBrightreeID,
      'location' => $location
    ]);
  }

  public function itemAddToLocations(?int $ItemBrightreeID = null, ?array $locations = null): mixed {
    return $this->apiCall('ItemAddToLocations', [
      'ItemBrightreeID' => $ItemBrightreeID,
      'locations' => $locations
    ]);
  }

  public function itemCreate(mixed $Item = null): mixed {
    return $this->apiCall('ItemCreate', [
      'Item' => $Item
    ]);
  }

  public function itemFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('ItemFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function itemFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('ItemFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function itemFetchReplacementItemsByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('ItemFetchReplacementItemsByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function itemFetchReplacementItemsByItemID(?string $ItemID = null): mixed {
    return $this->apiCall('ItemFetchReplacementItemsByItemID', [
      'ItemID' => $ItemID
    ]);
  }

  public function itemLocationUpdate(?int $ItemBrightreeID = null, mixed $itemLoc = null): mixed {
    return $this->apiCall('ItemLocationUpdate', [
      'ItemBrightreeID' => $ItemBrightreeID,
      'itemLoc' => $itemLoc
    ]);
  }

  public function itemLocationsUpdate(?int $ItemBrightreeID = null, ?array $itemLocs = null): mixed {
    return $this->apiCall('ItemLocationsUpdate', [
      'ItemBrightreeID' => $ItemBrightreeID,
      'itemLocs' => $itemLocs
    ]);
  }

  public function itemMaintenanceAddTracking(?int $BrightreeID = null, ?ShippingTrackingInfo $TrackingInfo = null): mixed {
    return $this->apiCall('ItemMaintenanceAddTracking', [
      'BrightreeID' => $BrightreeID,
      'TrackingInfo' => $TrackingInfo
    ]);
  }

  public function itemMaintenanceFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('ItemMaintenanceFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function itemMaintenanceNoteCreate(?int $ItemMaintenanceBrightreeID = null, mixed $note = null): mixed {
    return $this->apiCall('ItemMaintenanceNoteCreate', [
      'ItemMaintenanceBrightreeID' => $ItemMaintenanceBrightreeID,
      'note' => $note
    ]);
  }

  public function itemMaintenanceUpdate(?int $BrightreeID = null, mixed $itemMaintenance = null): mixed {
    return $this->apiCall('ItemMaintenanceUpdate', [
      'BrightreeID' => $BrightreeID,
      'itemMaintenance' => $itemMaintenance
    ]);
  }

  public function itemSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('ItemSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function itemSearchWithDetails(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('ItemSearchWithDetails', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function itemUpdate(mixed $Item = null): mixed {
    return $this->apiCall('ItemUpdate', [
      'Item' => $Item
    ]);
  }

  public function itemVendorCreate(mixed $VendorItem = null): mixed {
    return $this->apiCall('ItemVendorCreate', [
      'VendorItem' => $VendorItem
    ]);
  }

  public function itemVendorDelete(?int $ItemVendorID = null): mixed {
    return $this->apiCall('ItemVendorDelete', [
      'ItemVendorID' => $ItemVendorID
    ]);
  }

  public function itemVendorFetchAllByItemKey(?int $BrightreeID = null): mixed {
    return $this->apiCall('ItemVendorFetchAllByItemKey', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function itemVendorUpdate(mixed $ItemVendor = null): mixed {
    return $this->apiCall('ItemVendorUpdate', [
      'ItemVendor' => $ItemVendor
    ]);
  }

  public function locationFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('LocationFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function manufacturerContractPricingAddPricing(mixed $Pricing = null): mixed {
    return $this->apiCall('ManufacturerContractPricingAddPricing', [
      'Pricing' => $Pricing
    ]);
  }

  public function manufacturerContractPricingFetchByItemID(?string $ItemID = null): mixed {
    return $this->apiCall('ManufacturerContractPricingFetchByItemID', [
      'ItemID' => $ItemID
    ]);
  }

  public function manufacturerContractPricingRemovePricing(?int $BrightreeID = null): mixed {
    return $this->apiCall('ManufacturerContractPricingRemovePricing', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function manufacturerContractPricingUpdatePricing(mixed $Pricing = null): mixed {
    return $this->apiCall('ManufacturerContractPricingUpdatePricing', [
      'Pricing' => $Pricing
    ]);
  }

  public function unitOfMeasureFetchForVendor(?int $BrightreeID = null): mixed {
    return $this->apiCall('UnitOfMeasureFetchForVendor', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function claimNoteTypeFetchAll(): mixed {
    return $this->apiCall('ClaimNoteTypeFetchAll', []);
  }

  public function coverageTypeFetchAll(): mixed {
    return $this->apiCall('CoverageTypeFetchAll', []);
  }

  public function itemMaintenanceReasonFetchAll(): mixed {
    return $this->apiCall('ItemMaintenanceReasonFetchAll', []);
  }

  public function kitTypeFetchAll(): mixed {
    return $this->apiCall('KitTypeFetchAll', []);
  }

  public function manufacturerInfoFetchAll(): mixed {
    return $this->apiCall('ManufacturerInfoFetchAll', []);
  }

  public function nDCFetchAll(): mixed {
    return $this->apiCall('NDCFetchAll', []);
  }

  public function stockingUOMFetchAll(): mixed {
    return $this->apiCall('StockingUOMFetchAll', []);
  }
}
