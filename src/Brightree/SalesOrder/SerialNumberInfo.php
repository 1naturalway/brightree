<?php

namespace Brightree\SalesOrder;

/**
 * A single serial number shipped against a sales order item.
 *
 * Maps to the SerialNumberInfo complex type accepted by
 * SalesOrderItemUpdateSerialNumbers and carried by SalesOrderItemInfo's
 * SerialNumbers collection. Note that InventoryService.wsdl declares an
 * unrelated type of the same name — that one is Brightree\Types\Inventory\
 * SerialNumberInfo, and the two are not interchangeable.
 *
 * Every field is minOccurs="0", and the two quantities are not nillable, so an
 * unset one has to be left out of the request rather than sent as nil — which
 * is what RequestPruner does with the nulls below.
 */
class SerialNumberInfo {
  public ?string $SerialNumber = null;

  public ?string $LotNumber = null;

  public ?int $Quantity = null;

  public ?int $PickedUpQuantity = null;

  public function setSerialNumber(?string $SerialNumber): self {
    $this->SerialNumber = $SerialNumber;

    return $this;
  }

  public function setLotNumber(?string $LotNumber): self {
    $this->LotNumber = $LotNumber;

    return $this;
  }

  public function setQuantity(?int $Quantity): self {
    $this->Quantity = $Quantity;

    return $this;
  }

  public function setPickedUpQuantity(?int $PickedUpQuantity): self {
    $this->PickedUpQuantity = $PickedUpQuantity;

    return $this;
  }
}
