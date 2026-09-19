<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrder\PriceType;

/**
 * Generated from the SOItemQuickAddWithPAR type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SOItemQuickAddWithPAR {
  public ?string $BarCode = null;

  public ?string $ItemId = null;

  public ?int $PARBrightreeID = null;

  public ?PriceType $PriceType = null;

  public ?int $Qty = null;

  public ?int $locKey = null;
}
