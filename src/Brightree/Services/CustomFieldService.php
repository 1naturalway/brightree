<?php

namespace Brightree\Services;

class CustomFieldService {

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1610/CustomFieldService/CustomFieldService.svc?singleWsdl";
  }

  public function CustomFieldValueSaveMultiple($category,$brightreeID,$fieldValues) {
    return $this->ApiCall('CustomFieldValueSaveMultiple', ['category' => $category, 'brightreeID' => $brightreeID, 'fieldValues' => $fieldValues]);
  }
}
