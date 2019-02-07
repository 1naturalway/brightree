<?php

namespace Brightree\Services;

use SoapClient;

class CustomFieldService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1610/CustomFieldService/CustomFieldService.svc?singleWsdl";
  }

  public function ApiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function CustomFieldValueSaveMultiple($category,$brightreeID,$fieldValues) {
    return $this->ApiCall('CustomFieldValueSaveMultiple', ['category' => $category, 'brightreeID' => $brightreeID, 'fieldValues' => $fieldValues]);
  }
}
