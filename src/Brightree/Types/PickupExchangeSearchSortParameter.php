<?php

namespace Brightree\Types;

use Brightree\Enums\PuExSearchSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the PickupExchangeSearchSortParameter type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangeSearchSortParameter {
  public ?PuExSearchSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
