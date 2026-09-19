<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrderTemplateScheduleSearchSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the SalesOrderTemplateScheduleSearchSortParameter type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateScheduleSearchSortParameter {
  public ?SalesOrderTemplateScheduleSearchSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
