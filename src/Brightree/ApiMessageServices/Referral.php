<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Address;

class Referral {
  public Address $Address;

  public ?int $BrightreeID = null;

  public LookupValue $Contact;

  public ?bool $ContactRemoved = null;

  public ?string $FaxNumber = null;

  public LookupValue $Group;

  public ?string $PhoneNumber = null;

  public ?string $ReferralType = null;

  public ?int $ReferralTypeBrightreeID = null;

  public ?string $ReferralTypeName = null;

  public ?string $UPIN = null;

  public function __construct() {
    $this->Address = new Address();
    $this->Contact = new LookupValue();
    $this->Group = new LookupValue();
  }

  public function getAddress(Address $address): Address {
    return $this->Address = $address;
  }

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function getContact(LookupValue $contact): LookupValue {
    return $this->Contact = $contact;
  }

  public function setContactRemoved(?bool $ContactRemoved): self {
    $this->ContactRemoved = $ContactRemoved;
    return $this;
  }

  public function setFaxNumber(?string $FaxNumber): self {
    $this->FaxNumber = $FaxNumber;
    return $this;
  }

  public function getGroup(LookupValue $group): LookupValue {
    return $this->Group = $group;
  }

  public function setPhoneNumber(?string $PhoneNumber): self {
    $this->PhoneNumber = $PhoneNumber;
    return $this;
  }

  public function setReferralType(?string $ReferralType): self {
    $this->ReferralType = $ReferralType;
    return $this;
  }

  public function setReferralTypeBrightreeID(?int $ReferralTypeBrightreeID): self {
    $this->ReferralTypeBrightreeID = $ReferralTypeBrightreeID;
    return $this;
  }

  public function setReferralTypeName(?string $ReferralTypeName): self {
    $this->ReferralTypeName = $ReferralTypeName;
    return $this;
  }

  public function setUPIN(?string $UPIN): self {
    $this->UPIN = $UPIN;
    return $this;
  }
}
