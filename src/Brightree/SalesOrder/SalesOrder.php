<?php

namespace Brightree\SalesOrder;

use Brightree\SalesOrder\DeliveryInfo;

class SalesOrder {
  public $DeliveryInfo;
  public $SalesOrderGeneralInfo;
  public $SalesOrderClinicalInfo;
  public $SalesOrderItems;
  public $ShippingTrackingInfos;

  public function __construct() {
    $this->SalesOrderItems = array();
    $this->ShippingTrackingInfos = array();
  }

  public function setDeliveryInfo(DeliveryInfo $info) {
    $this->DeliveryInfo = $info;
  }
}
