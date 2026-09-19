<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrderSortFields;
use Brightree\Enums\SortOrder;

/**
 * Generated from the SalesOrderSortParameter type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderSortParameter {
  public ?SalesOrderSortFields $SortField = null;

  public ?SortOrder $SortOrder = null;
}
