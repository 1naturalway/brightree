<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;

class SalesOrderFulfillmentDetails {
  public ?string $AccountNumber = null;

  public ?int $BrightreeID = null;

  public LookupValue $FulfillmentVendor;

  public LookupValue $ShipBy;

  public ?string $Status = null;

  public ?string $StatusDate = null;

  public function __construct() {
    $this->FulfillmentVendor = new LookupValue();
    $this->ShipBy = new LookupValue();
  }

  public function getFulfillmentVendor(LookupValue $vendor): LookupValue {
    return $this->FulfillmentVendor = $vendor;
  }

  public function getShipBy(LookupValue $shipment): LookupValue {
    return $this->ShipBy = $shipment;
  }

  public function setAccountNumber(?string $AccountNumber): self {
    $this->AccountNumber = $AccountNumber;
    return $this;
  }

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setStatus(?string $Status): self {
    $this->Status = $Status;
    return $this;
  }

  public function setStatusDate(?string $StatusDate): self {
    $this->StatusDate = $StatusDate;
    return $this;
  }
}
