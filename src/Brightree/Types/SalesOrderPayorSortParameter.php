<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrderPayorSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the SalesOrderPayorSortParameter type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderPayorSortParameter {
  public ?SalesOrderPayorSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
