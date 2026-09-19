<?php

namespace Brightree\CommonServices;

class EmergencyContact {
  public Address $Address;

  public ?string $EmailAddress = null;

  public ?string $FaxNumber = null;

  public ?string $MobilePhone = null;

  public Name $Name;

  public ?string $PhoneNumber = null;

  public ?string $ContactType = null;

  public ?string $EmergencyContactType = null;

  public function __construct() {
    $this->Address = new Address();
    $this->Name = new Name();
  }
}
