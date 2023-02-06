<?php

namespace Brightree\ApiMessageServices;

class BrightShip {
  public $Carrier;

  public $ShippingMethod;

  public $status;

  public function setStatus($status) {
    $this->status = $status;
    return $this;
  }

  public function setShippingMethod($ShippingMethod) {
    $this->ShippingMethod = $ShippingMethod;
    return $this;
  }

  public function setCarrier($Carrier) {
    $this->Carrier = $Carrier;
    return $this;
  }
}
