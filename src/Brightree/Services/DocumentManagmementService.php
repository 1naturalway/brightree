<?php

namespace Brightree\Services;

use SoapClient;
use Brightree\DocumentManagement\DocumentManagement;

class DocumentManagementService{
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1610/DocumentationService/DocumentManagementService.svc?singleWsdl";
  }

  public function ApiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function DocumentBatchCreate($BrightreeID) {
    return $this->ApiCall('DocumentBatchCreate', ['BrightreeID' => $BrightreeID]);
  }

  public function DocumentBatchSearch($BrightreeID) {
    return $this->ApiCall('DocumentBatchSearch', ['BrightreeID' => $BrightreeID]);
  }

  public function DocumentSearch($PtID) {  
    return $this->ApiCall('DocumentSearch',
    	array(
			'searchRequest' => array(
				'PatientID' => $PtID
			),
			'sortRequest' => ''
		));
  }

  public function DocumentTypesFetchAll() {  
    return $this->ApiCall('DocumentTypesFetchAll','');
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
