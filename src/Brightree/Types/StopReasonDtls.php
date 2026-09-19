<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the StopReasonDtls type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class StopReasonDtls {
  public ?int $BrightreeID = null;

  public ?string $StopDt = null;

  public ?LookupValue $StopReason = null;
}
