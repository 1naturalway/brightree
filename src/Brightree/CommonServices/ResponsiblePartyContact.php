<?php

namespace Brightree\CommonServices;

class ResponsiblePartyContact {
  public Address $Address;

  public ?string $EmailAddress = null;

  public ?string $FaxNumber = null;

  public ?string $MobilePhone = null;

  public Name $Name;

  public ?string $PhoneNumber = null;

  public ?string $ContactType = null;

  public ?string $ResponsiblePartyType = null;

  public function __construct() {
    $this->Address = new Address();
    $this->Name = new Name();
  }

  public function setAddress(Address $Address): self {
    $this->Address = $Address;

    return $this;
  }

  public function setEmailAddress(?string $EmailAddress): self {
    $this->EmailAddress = $EmailAddress;

    return $this;
  }

  public function setFaxNumber(?string $FaxNumber): self {
    $this->FaxNumber = $FaxNumber;

    return $this;
  }

  public function setMobilePhone(?string $MobilePhone): self {
    $this->MobilePhone = $MobilePhone;

    return $this;
  }

  public function setName(Name $Name): self {
    $this->Name = $Name;

    return $this;
  }

  public function setPhoneNumber(?string $PhoneNumber): self {
    $this->PhoneNumber = $PhoneNumber;

    return $this;
  }

  public function setContactType(?string $ContactType): self {
    $this->ContactType = $ContactType;

    return $this;
  }

  public function setResponsiblePartyType(?string $ResponsiblePartyType): self {
    $this->ResponsiblePartyType = $ResponsiblePartyType;

    return $this;
  }
}
