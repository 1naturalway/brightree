<?php

namespace Brightree\CommonServices;

class ContactInfo {
  public $PhoneNumber;
  public $FaxNumber;
  public $FaxAttention;
  public $MobilePhoneNumber;
  public $EmailAddress;
  public $ExcludeFaxService;

  public function setPhoneNumber($PhoneNumber) {
    $this->PhoneNumber = $PhoneNumber;
    return $this;
  }

  public function setFaxNumber($FaxNumber) {
    $this->FaxNumber = $FaxNumber;
    return $this;
  }

  public function setFaxAttention($FaxAttention) {
    $this->FaxAttention = $FaxAttention;
    return $this;
  }

  public function setMobilePhoneNumber($MobilePhoneNumber) {
    $this->MobilePhoneNumber = $MobilePhoneNumber;
    return $this;
  }

  public function setEmailAddress($EmailAddress) {
    $this->EmailAddress = $EmailAddress;
    return $this;
  }

  public function setExcludeFaxService($ExcludeFaxService) {
    $this->ExcludeFaxServices = $ExcludeFaxService;
    return $this;
  }
}
