<?php

namespace Brightree\CommonServices;

class ResponsiblePartyContact {
  public $Address;

  public $EmailAddress;

  public $FaxNumber;

  public $MobilePhone;

  public $Name;

  public $PhoneNumber;

  public $ContactType;

  public $ResponsiblePartyType;

  public function __construct() {
    $this->Address = new Address();
    $this->Name = new Name();
  }

  public function setAddress($Address) {
    $this->Address = $Address;

    return $this;
  }

  public function setEmailAddress($EmailAddress) {
    $this->EmailAddress = $EmailAddress;

    return $this;
  }

  public function setFaxNumber($FaxNumber) {
    $this->FaxNumber = $FaxNumber;

    return $this;
  }

  public function setMobilePhone($MobilePhone) {
    $this->MobilePhone = $MobilePhone;

    return $this;
  }

  public function setName($Name) {
    $this->Name = $Name;

    return $this;
  }

  public function setPhoneNumber($PhoneNumber) {
    $this->PhoneNumber = $PhoneNumber;

    return $this;
  }

  public function setContactType($ContactType) {
    $this->ContactType = $ContactType;

    return $this;
  }

  public function setResponsiblePartyType($ResponsiblePartyType) {
    $this->ResponsiblePartyType = $ResponsiblePartyType;

    return $this;
  }
}
