<?php

namespace Brightree\ApiMessageServices;

use Brightree\Enums\SalesOrder\PriceType;

class SOItemQuickAdd {
  public PriceType|string|null $PriceType = null;

  public ?int $Qty = null;

  public ?string $ItemId = null;

  public ?string $BarCode = null;

  public ?int $locKey = null;
}
