<?php

namespace Brightree\ApiMessageServices;

class LocationVendor {
  public $BrightreeID;
  public $BulkAccountNumber;
  public $DropShipAccountNumber;
  public $EDIContact;
  public $Location;

  public function __construct() {
    $this->Location = new LookupValue;
  }
}
