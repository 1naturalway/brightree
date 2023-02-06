<?php

namespace Brightree\Patient;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\Name;

class Contact {
  public $Name;

  public $Address;

  public $PhoneNumber;

  public $FaxNumber;

  public $EmailAddress;

  public function __construct() {
    $this->Name = new Name();
    $this->Address = new Address();
  }
}
