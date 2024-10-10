<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class DocumentManagementService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2108/DocumentationService/DocumentManagementService.svc?singleWsdl";
  }

  public function documentBatchCreate($Batch) {
    return $this->apiCall('DocumentBatchCreate', ['batch' => $Batch]);
  }

  public function documentBatchSearch($searchRequest, $sortRequest, $pageSize, $page) {
    return $this->apiCall('DocumentBatchSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function documentTypesFetchAll() {
    return $this->apiCall('DocumentTypesFetchAll', []);
  }

  public function generateDocumentID($DocumentTypeBrightreeID, $EntityType, $EntityBrightreeID) {
    return $this->apiCall('GenerateDocumentID', [
      'DocumentTypeBrightreeID' => $DocumentTypeBrightreeID,
      'EntityType' => $EntityType,
      'EntityBrightreeID' => $EntityBrightreeID
    ]);
  }

  public function storeDocument($BatchBrightreeID, $DocumentTypeBrightreeID, $PropertyBag, $SearchforBarCode, $FileContents) {
    return $this->apiCall('StoreDocument', [
      'BatchBrightreeID' => $BatchBrightreeID,
      'DocumentTypeBrightreeID' => $DocumentTypeBrightreeID,
      'PropertyBag' => $PropertyBag,
      'SearchforBarCode' => $SearchforBarCode,
      'FileContents' => $FileContents
    ]);
  }
}
