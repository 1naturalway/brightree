<?php

namespace Brightree\SalesOrder;

/**
 * A single lot number shipped against a sales order item.
 *
 * Maps to the LotNumberInfo complex type accepted by SalesOrderItemUpdateLotNumbers.
 * Every field is minOccurs="0", and the two quantities are not nillable, so an
 * unset one has to be left out of the request rather than sent as nil —
 * which is what RequestPruner does with the nulls below.
 */
class LotNumberInfo {
  public ?string $LotNumber = null;

  public ?int $Quantity = null;

  public ?int $PickedUpQuantity = null;

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
