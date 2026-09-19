<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrderWIPStatusUpdateSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the SalesOrderWIPStatusUpdateSortParameter type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderWIPStatusUpdateSortParameter {
  public ?SalesOrderWIPStatusUpdateSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
