<?php

namespace Brightree\Types;

use Brightree\Enums\PriceTableType;

/**
 * Generated from the PriceTableSearchRequest type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PriceTableSearchRequest {
  public ?PriceTableType $PriceTableType = null;

  public ?string $State = null;
}
