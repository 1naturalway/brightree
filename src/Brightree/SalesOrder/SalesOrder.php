<?php

namespace Brightree\SalesOrder;

use Brightree\SalesOrder\DeliveryInfo;
use Brightree\SalesOrder\SalesOrderClinicalInfo;
use Brightree\SalesOrder\SalesOrderGeneralInfo;

class SalesOrder {
  public $DeliveryInfo;
  public $SalesOrderGeneralInfo;
  public $SalesOrderClinicalInfo;
  public $SalesOrderItems;
  public $ShippingTrackingInfos;

  public function __construct() {
    $this->DeliveryInfo = new DeliveryInfo();
    $this->SalesOrderGeneralInfo = new SalesOrderGeneralInfo();
    $this->SalesOrderClinicalInfo = new SalesOrderClinicalInfo();
    $this->SalesOrderItems = array();
    $this->ShippingTrackingInfos = array();
  }

  public function setDeliveryInfo(DeliveryInfo $info) {
    $this->DeliveryInfo = $info;
  }
}
