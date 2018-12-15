<?php

namespace Brightree;

use SoapClient;

class referenceDataService {
  private $params;
  private $wsdl_path = "https://webservices.brightree.net/v0100-1811/ReferenceDataService/ReferenceDataService.svc?singleWsdl";

  function __construct($params) {
    $this->params = $params;
  }

  public function apiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }
}
