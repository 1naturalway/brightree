<?php

namespace Brightree\Patient;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\Name;

class Contact {
  public Name $Name;

  public Address $Address;

  public ?string $PhoneNumber = null;

  public ?string $FaxNumber = null;

  public ?string $EmailAddress = null;

  public ?string $MobilePhone = null;

  public function __construct() {
    $this->Name = new Name();
    $this->Address = new Address();
  }
}
