<?php

namespace Brightree\CommonServices;

class Address {
  public ?string $AddressLine1 = null;

  public ?string $AddressLine2 = null;

  public ?string $AddressLine3 = null;

  public ?string $City = null;

  public ?string $PostalCode = null;

  public ?string $County = null;

  public ?string $Country = null;

  public ?string $State = null;

  public function setAddressLine1(?string $AddressLine1): self {
    $this->AddressLine1 = $AddressLine1;
    return $this;
  }

  public function setAddressLine2(?string $AddressLine2): self {
    $this->AddressLine2 = $AddressLine2;
    return $this;
  }

  public function setAddressLine3(?string $AddressLine3): self {
    $this->AddressLine3 = $AddressLine3;
    return $this;
  }

  public function setCity(?string $City): self {
    $this->City = $City;
    return $this;
  }

  public function setPostalCode(?string $PostalCode): self {
    $this->PostalCode = $PostalCode;
    return $this;
  }

  public function setCounty(?string $County): self {
    $this->County = $County;
    return $this;
  }

  public function setCountry(?string $Country): self {
    $this->Country = $Country;
    return $this;
  }

  public function setState(?string $State): self {
    $this->State = $State;
    return $this;
  }
}
