<?php

namespace Brightree\SalesOrder;

class SalesOrderItemPayorInfo {
  public ?int $PayorKey = null;

  public ?string $PayorUsage = null;

  public ?string $PayorName = null;

  public ?string $PayorLevel = null;

  public ?bool $BillForDenial = null;
}
