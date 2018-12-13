<?php

namespace Brightree\CommonServices;


class ContactInfo {
  public $PhoneNumber;
  public $FaxNumber;
  public $FaxAttention;
  public $MobilePhoneNumber;
  public $EmailAddress;
  public $ExcludeFaxServices;

  /**
   * Get the value of PhoneNumber
   */
  public function getPhoneNumber()
  {
    return $this->PhoneNumber;
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
   * Get the value of FaxAttention
   */
  public function getFaxAttention()
  {
    return $this->FaxAttention;
  }

  /**
   * Set the value of FaxAttention
   *
   * @return  self
   */
  public function setFaxAttention($FaxAttention)
  {
    $this->FaxAttention = $FaxAttention;

    return $this;
  }

  /**
   * Get the value of MobilePhoneNumber
   */
  public function getMobilePhoneNumber()
  {
    return $this->MobilePhoneNumber;
  }

  /**
   * Set the value of MobilePhoneNumber
   *
   * @return  self
   */
  public function setMobilePhoneNumber($MobilePhoneNumber)
  {
    $this->MobilePhoneNumber = $MobilePhoneNumber;

    return $this;
  }

  /**
   * Get the value of EmailAddress
   */
  public function getEmailAddress()
  {
    return $this->EmailAddress;
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
   * Get the value of ExcludeFaxServices
   */
  public function getExcludeFaxServices()
  {
    return $this->ExcludeFaxServices;
  }

  /**
   * Set the value of ExcludeFaxServices
   *
   * @return  self
   */
  public function setExcludeFaxServices($ExcludeFaxServices)
  {
    $this->ExcludeFaxServices = $ExcludeFaxServices;

    return $this;
  }
}
