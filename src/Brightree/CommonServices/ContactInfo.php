<?php

namespace Brightree\CommonServices\SalesOrder;


class contactInfo {
  public $PhoneNumber;
  public $FaxNumber;
  public $FaxAttention;
  public $MobilePhoneNumber;
  public $EmailAddress;
  public $ExcludeFaxServices;

  public function setContactInfo(Contact $contactInfo) {
    $this->PhoneNumber = $contactInfo;
    $this->FaxNumber = $contactInfo;
    $this->FaxAttention = $contactInfo;
    $this->MobilePhoneNumber = $contactInfo;
    $this->EmailAddress = $contactInfo;
    $this->ExcludeFaxServices = $contactInfo;
  }
}
