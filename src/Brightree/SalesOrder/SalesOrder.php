<?php

namespace Brightree\SalesOrder;

use Brightree\SalesOrder\DeliveryInfo;
use Brighttree\SalesOrder\SalesOrderClinicalInfo;
use Brighttree\SalesOrder\SalesOrderGeneralInfo;

class SalesOrder {
  public $DeliveryInfo;
  public $SalesOrderGeneralInfo;
  public $SalesOrderClinicalInfo;
  public $SalesOrderItems;
  public $ShippingTrackingInfos;

  public function __construct() {
    $this->DeliveryInfo = new DeliveryInfo();

    $this->SalesOrderGeneralInfo = array();
    $this->SalesOrderClinicalInfo = array();
    $this->SalesOrderItems = array();
    $this->ShippingTrackingInfos = array();
  }

  public function setDeliveryInfo(DeliveryInfo $info) {
    $this->DeliveryInfo = $info;
  }
}
