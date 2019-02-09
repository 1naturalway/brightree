<?php

namespace Brightree\Services;

use Brightree\DocumentManagement\DocumentManagement;

class DocumentManagementService{

  use \Brightree\Traits\ApiTrait;
  
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1610/DocumentationService/DocumentManagementService.svc?singleWsdl";
  }

  public function DocumentBatchCreate($BrightreeID) {
    return $this->ApiCall('DocumentBatchCreate', ['BrightreeID' => $BrightreeID]);
  }

  public function DocumentBatchSearch($BrightreeID) {
    return $this->ApiCall('DocumentBatchSearch', ['BrightreeID' => $BrightreeID]);
  }

  public function DocumentSearch($PtID) {
    return $this->ApiCall('DocumentSearch', ['searchRequest' => [ 'PatientID' => $PtID ], 'sortRequest' => '']);
  }

  public function DocumentTypesFetchAll() {
    return $this->ApiCall('DocumentTypesFetchAll',[]);
  }

  public function FetchDocumentContent($DocumentKey) {
    return $this->ApiCall('FetchDocumentContent', ['documentKey' => $DocumentKey]);
  }

  public function GenerateDocumentID($BrightreeID) {
    return $this->ApiCall('GenerateDocumentID', ['DocumentTypeBrightreeID' => $BrightreeID]);
  }

  public function StoreDocument($Contents) {
    return $this->ApiCall('StoreDocument', ['Contents' => $Contents]);
  }
}
