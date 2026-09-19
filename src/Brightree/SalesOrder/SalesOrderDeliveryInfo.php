<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;
use Brightree\Enums\SetupMethod;

/**
 * The WSDL's SalesOrderDeliveryInfo, which extends DeliveryInfo (Address,
 * ContactInfo, DeliveryNote) with the sales-order-specific fields below.
 * Both are flattened into this one class.
 */
class SalesOrderDeliveryInfo {
  public Address $Address;

  public ContactInfo $ContactInfo;

  public ?string $DeliveryNote = null;

  public ?string $ActualDeliveryDateTime = null;

  public ?LookupValue $DeliveryTechnician = null;

  public ?LookupValue $DropShipStatus = null;

  public LookupValue $Facility;

  public ?string $OrderNote = null;

  public SalesOrderFulfillmentDetails $SalesOrderFulfillmentDetails;

  public ?string $ScheduledDeliveryDateTime = null;

  public ?bool $SignatureRequired = null;

  public LookupValue $TaxZone;

  public SetupMethod|string|null $SetupMethod = null;

  public function __construct() {
    $this->Address = new Address();
    $this->ContactInfo = new ContactInfo();
    $this->Facility = new LookupValue();
    $this->SalesOrderFulfillmentDetails = new SalesOrderFulfillmentDetails();
    $this->TaxZone = new LookupValue();
  }

  public function setAddress(Address $address): void {
    $this->Address = $address;
  }

  public function setContactInfo(ContactInfo $info): void {
    $this->ContactInfo = $info;
  }

  public function getSalesOrderFulfillmentDetails(SalesOrderFulfillmentDetails $details): void {
    $this->SalesOrderFulfillmentDetails = $details;
  }

  public function getTaxZone(LookupValue $LookupValue): LookupValue {
    return $this->TaxZone = $LookupValue;
  }

  public function setDeliveryNote(?string $DeliveryNote): self {
    $this->DeliveryNote = $DeliveryNote;
    return $this;
  }

  public function setActualDeliveryDateTime(?string $ActualDeliveryDateTime): self {
    $this->ActualDeliveryDateTime = $ActualDeliveryDateTime;
    return $this;
  }

  public function setDeliveryTechnician(?LookupValue $DeliveryTechnician): self {
    $this->DeliveryTechnician = $DeliveryTechnician;
    return $this;
  }

  public function setDropShipStatus(?LookupValue $DropShipStatus): self {
    $this->DropShipStatus = $DropShipStatus;
    return $this;
  }

  public function setFacility(LookupValue $Facility): self {
    $this->Facility = $Facility;
    return $this;
  }

  public function setOrderNote(?string $OrderNote): self {
    $this->OrderNote = $OrderNote;
    return $this;
  }

  public function setSalesOrderFulfillmentDetails(SalesOrderFulfillmentDetails $SalesOrderFulfillmentDetails): self {
    $this->SalesOrderFulfillmentDetails = $SalesOrderFulfillmentDetails;
    return $this;
  }

  public function setScheduledDeliveryDateTime(?string $ScheduledDeliveryDateTime): self {
    $this->ScheduledDeliveryDateTime = $ScheduledDeliveryDateTime;
    return $this;
  }

  public function setSignatureRequired(?bool $SignatureRequired): self {
    $this->SignatureRequired = $SignatureRequired;
    return $this;
  }

  public function setSetupMethod(SetupMethod|string|null $SetupMethod): self {
    $this->SetupMethod = $SetupMethod;
    return $this;
  }
}
