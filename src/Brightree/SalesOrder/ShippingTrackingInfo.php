<?php

namespace Brightree\SalesOrder;

class ShippingTrackingInfo {
  public $Carrier;

  public $TrackingNumber;

  public $TrackingShipDate;

  public function setCarrier($Carrier) {
    $this->Carrier = $Carrier;
    return $this;
  }

  public function setTrackingNumber($TrackingNumber) {
    $this->TrackingNumber = $TrackingNumber;
    return $this;
  }

  public function setTrackingShipDate($TrackingShipDate) {
    $this->TrackingShipDate = $TrackingShipDate;
    return $this;
  }
}
