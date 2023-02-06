<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;

class SalesOrderFulfillmentDetails {
  public $AccountNumber;

  public $BrightreeID;

  public $FulfillmentVendor;

  public $ShipBy;

  public $Status;

  public $statusCode;

  public function __construct() {
    $this->FulfillmentVendor = new LookupValue();
    $this->ShipBy = new LookupValue();
  }

  public function getFulfillmentVendor(LookupValue $vendor) {
    return $this->FulfillmentVendor = $vendor;
  }

  public function getShipBy(LookupValue $shipment) {
    return $this->ShipBy = $shipment;
  }

  public function setAccountNumber($AccountNumber) {
    $this->AccountNumber = $AccountNumber;
    return $this;
  }

  public function setBrightreeID($BrightreeID) {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setStatus($Status) {
    $this->Status = $Status;
    return $this;
  }

  public function setStatusCode($statusCode) {
    $this->statusCode = $statusCode;
    return $this;
  }
}
