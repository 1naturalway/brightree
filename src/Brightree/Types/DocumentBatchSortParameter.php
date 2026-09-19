<?php

namespace Brightree\Types;

use Brightree\Enums\DocumentBatchSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the DocumentBatchSortParameter type in DocumentManagementService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class DocumentBatchSortParameter {
  public ?DocumentBatchSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
