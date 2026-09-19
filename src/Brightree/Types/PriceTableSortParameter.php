<?php

namespace Brightree\Types;

use Brightree\Enums\PriceTableSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the PriceTableSortParameter type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PriceTableSortParameter {
  public ?PriceTableSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
