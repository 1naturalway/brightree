<?php

namespace Brightree\SalesOrder;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;

class DeliveryInfo {
  public $Address;
  public $ContactInfo;

  public function __construct() {
    $this->Address = new Address();
    $this->ContactInfo = new ContactInfo();
  }

  public function setAddress(Address $address) {
    $this->Address = $address;
  }

  public function setContactInfo(ContactInfo $info) {
    $this->ContactInfo = $info;
  }
}
