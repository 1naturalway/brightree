<?php

namespace App\Library\Brightree\SalesOrder;

class DeliveryInfo {
  public $Address;
  public $ContactInfo;

  public function setAddress(Address $address) {
    $this->Address = $address;
  }

  public function setContactInfo(ContactInfo $info) {
    $this->ContactInfo = $info;
  }
}
