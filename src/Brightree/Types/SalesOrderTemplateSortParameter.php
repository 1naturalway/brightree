<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrderTemplateSortFields;
use Brightree\Enums\SortOrder;

/**
 * Generated from the SalesOrderTemplateSortParameter type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateSortParameter {
  public ?SalesOrderTemplateSortFields $SortField = null;

  public ?SortOrder $SortOrder = null;
}
