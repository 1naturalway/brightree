<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;
use Brightree\DocumentManagement\DocumentBatch;
use Brightree\DocumentManagement\DocumentBatchSearchRequest;

class DocumentManagementService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/DocumentationService/DocumentManagementService.svc?singleWsdl";
  }

  public function documentBatchCreate(?DocumentBatch $Batch): mixed {
    return $this->apiCall('DocumentBatchCreate', ['batch' => $Batch]);
  }

  public function documentBatchSearch(?DocumentBatchSearchRequest $searchRequest, ?array $sortRequest, ?int $pageSize, ?int $page): mixed {
    return $this->apiCall('DocumentBatchSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function documentTypesFetchAll(): mixed {
    return $this->apiCall('DocumentTypesFetchAll', []);
  }

  public function generateDocumentID(?int $DocumentTypeBrightreeID, ?string $EntityType, ?int $EntityBrightreeID): mixed {
    return $this->apiCall('GenerateDocumentID', [
      'DocumentTypeBrightreeID' => $DocumentTypeBrightreeID,
      'EntityType' => $EntityType,
      'EntityBrightreeID' => $EntityBrightreeID
    ]);
  }

  public function storeDocument(?int $BatchBrightreeID, ?int $DocumentTypeBrightreeID, ?array $PropertyBag, ?bool $SearchForBarCode, ?string $Contents): mixed {
    return $this->apiCall('StoreDocument', [
      'BatchBrightreeID' => $BatchBrightreeID,
      'DocumentTypeBrightreeID' => $DocumentTypeBrightreeID,
      'PropertyBag' => $PropertyBag,
      'SearchForBarCode' => $SearchForBarCode,
      'Contents' => $Contents
    ]);
  }

  public function documentPropertyUpdate(?int $documentKey = null, ?array $propertyBag = null): mixed {
    return $this->apiCall('DocumentPropertyUpdate', [
      'documentKey' => $documentKey,
      'propertyBag' => $propertyBag
    ]);
  }

  public function documentReviewUpdate(?int $documentKey = null, mixed $documentReviewUpdateRequest = null): mixed {
    return $this->apiCall('DocumentReviewUpdate', [
      'documentKey' => $documentKey,
      'documentReviewUpdateRequest' => $documentReviewUpdateRequest
    ]);
  }

  public function documentSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('DocumentSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function fetchDocumentContent(?int $documentKey = null): mixed {
    return $this->apiCall('FetchDocumentContent', [
      'documentKey' => $documentKey
    ]);
  }

  public function storeDocumentAndReturnInfo(?int $BatchBrightreeID = null, ?int $DocumentTypeBrightreeID = null, ?array $PropertyBag = null, ?bool $SearchForBarCode = null, ?string $Contents = null): mixed {
    return $this->apiCall('StoreDocumentAndReturnInfo', [
      'BatchBrightreeID' => $BatchBrightreeID,
      'DocumentTypeBrightreeID' => $DocumentTypeBrightreeID,
      'PropertyBag' => $PropertyBag,
      'SearchForBarCode' => $SearchForBarCode,
      'Contents' => $Contents
    ]);
  }

  public function documentReviewReasonFetchAll(): mixed {
    return $this->apiCall('DocumentReviewReasonFetchAll', []);
  }
}
