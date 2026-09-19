<?php

namespace Brightree\Types;

use Brightree\Enums\PickupExchangePayorSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the PickupExchangePayorSortParameter type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangePayorSortParameter {
  public ?PickupExchangePayorSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
