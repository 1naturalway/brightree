<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\SaleType;

/**
 * Generated from the InsuranceSpanDateHoldInclusion type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceSpanDateHoldInclusion {
  public ?int $BrightreeID = null;

  public ?int $InsuranceBrightreeID = null;

  public ?LookupValue $ProcCode = null;

  public ?SaleType $SaleType = null;
}
