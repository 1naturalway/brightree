<?php

namespace Brightree\SalesOrder;

use Brightree\Enums\PayorLevel;
use Brightree\Enums\PayorUsages;

class SalesOrderItemPayorInfo {
  public ?int $PayorKey = null;

  public PayorUsages|string|null $PayorUsage = null;

  public ?string $PayorName = null;

  public PayorLevel|string|null $PayorLevel = null;

  public ?bool $BillForDenial = null;
}
