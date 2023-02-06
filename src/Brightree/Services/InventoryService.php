<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class InventoryService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2006/InventoryService/InventoryService.svc?singleWsdl";
  }

  public function itemFetchByItemID($ItemID) {
    return $this->apiCall('ItemFetchByItemID', ['ItemID' => $ItemID]);
  }
}
