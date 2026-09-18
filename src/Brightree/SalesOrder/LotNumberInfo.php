<?php

namespace Brightree\SalesOrder;

/**
 * A single lot number shipped against a sales order item.
 *
 * Maps to the LotNumberInfo complex type accepted by SalesOrderItemUpdateLotNumbers.
 * LotNumber is nillable in the schema, so it is nullable here. Quantity is not nillable
 * but is optional, and PickedUpQuantity defaults to 0 because a null would be encoded as
 * a nil value on an element the schema does not allow one for.
 */
class LotNumberInfo {
  public ?string $LotNumber = null;

  public ?int $Quantity = null;

  public int $PickedUpQuantity = 0;

  public function setLotNumber(?string $LotNumber): self {
    $this->LotNumber = $LotNumber;

    return $this;
  }

  public function setQuantity(?int $Quantity): self {
    $this->Quantity = $Quantity;

    return $this;
  }

  public function setPickedUpQuantity(int $PickedUpQuantity): self {
    $this->PickedUpQuantity = $PickedUpQuantity;

    return $this;
  }
}
