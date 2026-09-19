<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrderVoidSortFields;
use Brightree\Enums\SortOrder;

/**
 * Generated from the SalesOrderVoidSortParameter type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderVoidSortParameter {
  public ?SalesOrderVoidSortFields $SortField = null;

  public ?SortOrder $SortOrder = null;
}
