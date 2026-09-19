<?php

namespace Brightree\Services;

use Brightree\ApiMessageServices\CustomFieldValue;
use Brightree\Services\BaseService;

class CustomFieldService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/CustomFieldService/CustomFieldService.svc?singleWsdl";
  }

  /**
   * @param CustomFieldValue[]|null $fieldValues
   */
  public function customFieldValueSaveMultiple(?string $category, ?int $brightreeID, ?array $fieldValues): mixed {
    return $this->apiCall('CustomFieldValueSaveMultiple', ['category' => $category, 'brightreeID' => $brightreeID, 'fieldValues' => $fieldValues]);
  }

  public function customFieldFetchAllByCategory(?string $category = null, ?bool $includeInactive = null): mixed {
    return $this->apiCall('CustomFieldFetchAllByCategory', [
      'category' => $category,
      'includeInactive' => $includeInactive
    ]);
  }

  public function customFieldValueFetchAllByBrightreeID(?string $category = null, ?int $brightreeID = null): mixed {
    return $this->apiCall('CustomFieldValueFetchAllByBrightreeID', [
      'category' => $category,
      'brightreeID' => $brightreeID
    ]);
  }
}
