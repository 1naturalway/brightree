<?php

namespace Brightree\CommonServices;

use Brightree\Enums\EmergencyContactTypeEnum;
use Brightree\Enums\PatientContactType;

class EmergencyContact {
  public Address $Address;

  public ?string $EmailAddress = null;

  public ?string $FaxNumber = null;

  public ?string $MobilePhone = null;

  public Name $Name;

  public ?string $PhoneNumber = null;

  public PatientContactType|string|null $ContactType = null;

  public EmergencyContactTypeEnum|string|null $EmergencyContactType = null;

  public function __construct() {
    $this->Address = new Address();
    $this->Name = new Name();
  }
}
