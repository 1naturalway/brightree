<?php

namespace Brightree\SalesOrder;

/**
 * Wrapper for the WSDL's ArrayOfShippingTrackingInfo, whose repeating child
 * element is named ShippingTrackingInfo.
 */
class ShippingTrackingInfos {
  public ShippingTrackingInfo $ShippingTrackingInfo;

  public function __construct() {
    $this->ShippingTrackingInfo = new ShippingTrackingInfo();
  }

  public function setShippingTrackingInfo(ShippingTrackingInfo $ShippingTrackingInfo): self {
    $this->ShippingTrackingInfo = $ShippingTrackingInfo;
    return $this;
  }
}
