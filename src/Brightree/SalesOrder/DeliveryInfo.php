<?php

namespace Brightree\SalesOrder;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;
use Brightree\ApiMessageServices\LookupValue;

class DeliveryInfo {
  public $Address;

  public $ContactInfo;

  public $DeliveryNote;

  public $ActualDeliveryDateTime;

  public $DeliveryTechnician;

  public $DropShipStatus;

  public $Facility;

  public $OrderNote;

  public $SalesOrderFulfillmentDetails;

  public $ScheduledDeliveryDateTime;

  public $SignatureRequired;

  public $TaxZone;

  public function __construct() {
    $this->Address = new Address();
    $this->ContactInfo = new ContactInfo();
    $this->Facility = new LookupValue();
    $this->SalesOrderFulfillmentDetails = new SalesOrderFulfillmentDetails();
    $this->TaxZone = new LookupValue();
  }

  public function setAddress(Address $address) {
    $this->Address = $address;
  }

  public function setContactInfo(ContactInfo $info) {
    $this->ContactInfo = $info;
  }

  public function getSalesOrderFulfillmentDetails(SalesOrderFulfillmentDetails $details) {
    $this->SalesOrderFulfillmentDetails = $details;
  }

  public function getTaxZone(LookupValue $LookupValue) {
    return $this->TaxZone = $LookupValue;
  }

  public function setDeliveryNote($DeliveryNote) {
    $this->DeliveryNote = $DeliveryNote;
    return $this;
  }

  public function setActualDeliveryDateTime($ActualDeliveryDateTime) {
    $this->ActualDeliveryDateTime = $ActualDeliveryDateTime;
    return $this;
  }

  public function setDeliveryTechnician($DeliveryTechnician) {
    $this->DeliveryTechnician = $DeliveryTechnician;
    return $this;
  }

  public function setDropShipStatus($DropShipStatus) {
    $this->DropShipStatus = $DropShipStatus;
    return $this;
  }

  public function setFacility($Facility) {
    $this->Facility = $Facility;
    return $this;
  }

  public function setOrderNote($OrderNote) {
    $this->OrderNote = $OrderNote;
    return $this;
  }

  public function setSalesOrderFulfillmentDetails($SalesOrderFulfillmentDetails) {
    $this->SalesOrderFulfillmentDetails = $SalesOrderFulfillmentDetails;
    return $this;
  }

  public function setScheduledDeliveryDateTime($ScheduledDeliveryDateTime) {
    $this->ScheduledDeliveryDateTime = $ScheduledDeliveryDateTime;
    return $this;
  }

  public function setSignatureRequired($SignatureRequired) {
    $this->SignatureRequired = $SignatureRequired;
    return $this;
  }
}
