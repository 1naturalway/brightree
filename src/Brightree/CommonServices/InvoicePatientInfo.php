<?php

namespace Brightree\CommonServices;

class InvoicePatientInfo {
  public Address $Address;

  public ?int $BrightreeID = null;

  public ContactInfo $ContactInfo;

  public Name $Name;

  public function __construct() {
    $this->Address = new Address();
    $this->ContactInfo = new ContactInfo();
    $this->Name = new Name();
  }

  public function setAddress(Address $Address): self {
    $this->Address = $Address;
    return $this;
  }

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setContactInfo(ContactInfo $ContactInfo): self {
    $this->ContactInfo = $ContactInfo;
    return $this;
  }

  public function setName(Name $Name): self {
    $this->Name = $Name;
    return $this;
  }
}
