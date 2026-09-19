<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrderTemplateScheduleLogSearchSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the SalesOrderTemplateScheduleLogSearchSortParameter type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateScheduleLogSearchSortParameter {
  public ?SalesOrderTemplateScheduleLogSearchSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
