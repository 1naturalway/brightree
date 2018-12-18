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


  /**
   * Set the value of Address
   *
   * @return  self
   */
  public function setAddress($Address)
  {
    $this->Address = $Address;

    return $this;
  }

  /**
   * Set the value of EmailAddress
   *
   * @return  self
   */
  public function setEmailAddress($EmailAddress)
  {
    $this->EmailAddress = $EmailAddress;

    return $this;
  }

  /**
   * Set the value of FaxNumber
   *
   * @return  self
   */
  public function setFaxNumber($FaxNumber)
  {
    $this->FaxNumber = $FaxNumber;

    return $this;
  }

  /**
   * Set the value of MobilePhone
   *
   * @return  self
   */
  public function setMobilePhone($MobilePhone)
  {
    $this->MobilePhone = $MobilePhone;

    return $this;
  }

  /**
   * Set the value of Name
   *
   * @return  self
   */
  public function setName($Name)
  {
    $this->Name = $Name;

    return $this;
  }

  /**
   * Set the value of PhoneNumber
   *
   * @return  self
   */
  public function setPhoneNumber($PhoneNumber)
  {
    $this->PhoneNumber = $PhoneNumber;

    return $this;
  }

  /**
   * Set the value of ContactType
   *
   * @return  self
   */
  public function setContactType($ContactType)
  {
    $this->ContactType = $ContactType;

    return $this;
  }

  /**
   * Set the value of ResponsiblePartyType
   *
   * @return  self
   */
  public function setResponsiblePartyType($ResponsiblePartyType)
  {
    $this->ResponsiblePartyType = $ResponsiblePartyType;

    return $this;
  }
}
