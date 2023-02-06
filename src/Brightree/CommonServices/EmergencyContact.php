<?php

namespace Brightree\CommonServices;

class EmergencyContact {
  public $Address;

  public $EmailAddress;

  public $FaxNumber;

  public $MobilePhone;

  public $Name;

  public $PhoneNumber;

  public $ContactType;

  public function __construct() {
    $this->Address = new Address();
    $this->Name = new Name();
  }
}
