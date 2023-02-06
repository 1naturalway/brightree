<?php

namespace Brightree\CommonServices;

class Address {
  public $AddressLine1;

  public $AddressLine2;

  public $AddressLine3;

  public $City;

  public $PostalCode;

  public $County;

  public $Country;

  public $State;

  public function setAddressLine1($AddressLine1) {
    $this->AddressLine1 = $AddressLine1;
    return $this;
  }

  public function setAddressLine2($AddressLine2) {
    $this->AddressLine2 = $AddressLine2;
    return $this;
  }

  public function setAddressLine3($AddressLine3) {
    $this->AddressLine3 = $AddressLine3;
    return $this;
  }

  public function setCity($City) {
    $this->City = $City;
    return $this;
  }

  public function setPostalCode($PostalCode) {
    $this->PostalCode = $PostalCode;
    return $this;
  }

  public function setCounty($County) {
    $this->County = $County;
    return $this;
  }

  public function setCountry($Country) {
    $this->Country = $Country;
    return $this;
  }

  public function setState($State) {
    $this->State = $State;
    return $this;
  }
}
