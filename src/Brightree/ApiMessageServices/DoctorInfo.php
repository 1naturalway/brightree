<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\Name;
use Brightree\ApiMessageServices\LookupValue;

class DoctorInfo {
  public LookupValue $Doctor;

  public Name $Name;

  public Address $Address;

  public ?string $Fax = null;

  public ?string $NPI = null;

  public ?string $Phone = null;

  public ?string $UPIN = null;

  public function __construct() {
    $this->Address = new Address();
    $this->Name = new Name();
    $this->Doctor = new LookupValue();
  }

  public function getAddress(Address $address): void {
    $this->Address = $address;
  }

  public function getName(Name $name): void {
    $this->Name = $name;
  }

  public function setDoctor(LookupValue $Doctor): self {
    $this->Doctor = $Doctor;
    return $this;
  }

  public function setFax(?string $Fax): self {
    $this->Fax = $Fax;
    return $this;
  }

  public function setNPI(?string $NPI): self {
    $this->NPI = $NPI;
    return $this;
  }

  public function setPhone(?string $Phone): self {
    $this->Phone = $Phone;
    return $this;
  }

  public function setUPIN(?string $UPIN): self {
    $this->UPIN = $UPIN;
    return $this;
  }
}
