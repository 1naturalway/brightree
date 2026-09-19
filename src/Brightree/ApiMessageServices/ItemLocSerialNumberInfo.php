<?php

namespace Brightree\ApiMessageServices;

class ItemLocSerialNumberInfo {
  public ?int $CommittedQty = null;

  public ?int $OnHandQty = null;

  public ?int $OnOrderQty = null;

  public ?int $OnRentQty = null;

  public ?string $ReceiptDate = null;

  public ?string $SerialNumber = null;

  public ?int $SoldAdjustedQty = null;
}
