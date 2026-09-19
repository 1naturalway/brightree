<?php

namespace Brightree\Types;

use Brightree\Enums\DocumentSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the DocumentSortParameter type in DocumentManagementService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class DocumentSortParameter {
  public ?DocumentSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
