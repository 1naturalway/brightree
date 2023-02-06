<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class CustomFieldService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1610/CustomFieldService/CustomFieldService.svc?singleWsdl";
  }

  public function customFieldValueSaveMultiple($category, $brightreeID, $fieldValues) {
    return $this->apiCall('CustomFieldValueSaveMultiple', ['category' => $category, 'brightreeID' => $brightreeID, 'fieldValues' => $fieldValues]);
  }
}
