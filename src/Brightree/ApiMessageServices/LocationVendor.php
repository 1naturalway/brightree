<?php

namespace Brightree\ApiMessageServices;

use Brightree\Patient\Contact;

class LocationVendor {
  public ?int $BrightreeID = null;

  public ?string $BulkAccountNumber = null;

  public ?string $DropShipAccountNumber = null;

  public ?Contact $EDIContact = null;

  public LookupValue $Location;

  public function __construct() {
    $this->Location = new LookupValue();
  }
}
