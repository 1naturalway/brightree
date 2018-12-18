<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\Name;
use Brightree\ApiMessageServices\LookupValue;

class DoctorInfo {
  public $Doctor;
  public $Name;
  public $Address;
  public $Fax;
  public $NPI;
  public $Phone;
  public $UPIN;

  public function __construct() {
    $this->Address = new Address();
    $this->Name = new Name();
    $this->Doctor = new LookupValue();
  }
  public function getAddress(Address $address) {
    $this->Address = $address;
  }

  public function getName(Name $name) {
    $this->Name = $name;
  }

  public function setDoctor($Doctor) {
    $this->Doctor = $Doctor;
    return $this;
  }

  public function setFax($Fax) {
    $this->Fax = $Fax;
    return $this;
 }

  public function setNPI($NPI) {
    $this->NPI = $NPI;
    return $this;
  }

  public function setPhone($Phone) {
    $this->Phone = $Phone;
    return $this;
  }

  public function setUPIN($UPIN) {
    $this->UPIN = $UPIN;
    return $this;
  }
}
