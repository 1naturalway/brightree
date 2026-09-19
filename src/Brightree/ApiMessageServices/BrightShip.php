<?php

namespace Brightree\ApiMessageServices;

class BrightShip {
  public ?LookupValue $Carrier = null;

  public ?LookupValue $ShippingMethod = null;

  public ?LookupValue $Status = null;

  public function setStatus(?LookupValue $Status): self {
    $this->Status = $Status;
    return $this;
  }

  public function setShippingMethod(?LookupValue $ShippingMethod): self {
    $this->ShippingMethod = $ShippingMethod;
    return $this;
  }

  public function setCarrier(?LookupValue $Carrier): self {
    $this->Carrier = $Carrier;
    return $this;
  }
}
