<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;

class ShippingTrackingInfo {
  public ?LookupValue $Carrier = null;

  public ?string $TrackingNumber = null;

  public ?string $TrackingShipDate = null;

  public function setCarrier(?LookupValue $Carrier): self {
    $this->Carrier = $Carrier;
    return $this;
  }

  public function setTrackingNumber(?string $TrackingNumber): self {
    $this->TrackingNumber = $TrackingNumber;
    return $this;
  }

  public function setTrackingShipDate(?string $TrackingShipDate): self {
    $this->TrackingShipDate = $TrackingShipDate;
    return $this;
  }
}
