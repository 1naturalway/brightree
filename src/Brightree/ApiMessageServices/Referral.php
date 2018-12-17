<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Address;

class Referral {
  public $Address;
  public $BrightreeID;
  public $Contact;
  public $ContactRemoved;
  public $FaxNumber;
  public $Group;
  public $PhoneNumber;
  public $ReferralType;
  public $ReferralTypeBrightreeID;
  public $ReferralTypeName;
  public $UPIN;

  public function __construct() {
    $this->Address = new Address();
    $this->Contact = new LookupValue();
    $this->Group = new LookupValue();
  }

  public function getAddress(Address $address) {
    return $this->Address = $address;
  }

  public function setBrightreeID($BrightreeID) {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function getContact(LookupValue $contact) {
    return $this->Contact = $contact;
  }

  public function setContactRemoved($ContactRemoved)
  {
    $this->ContactRemoved = $ContactRemoved;
    return $this;
  }

  public function setFaxNumber($FaxNumber) {
    $this->FaxNumber = $FaxNumber;
    return $this;
  }

  public function getGroup(LookupValue $group) {
    return $this->Group = $group;
  }

  public function setPhoneNumber($PhoneNumber) {
    $this->PhoneNumber = $PhoneNumber;
    return $this;
  }

  public function setReferralType($ReferralType) {
    $this->ReferralType = $ReferralType;
    return $this;
  }

  public function setReferralTypeBrightreeID($ReferralTypeBrightreeID) {
    $this->ReferralTypeBrightreeID = $ReferralTypeBrightreeID;
    return $this;
  }

  public function setReferralTypeName($ReferralTypeName) {
    $this->ReferralTypeName = $ReferralTypeName;
    return $this;
  }

  public function setUPIN($UPIN) {
    $this->UPIN = $UPIN;
    return $this;
  }
}
