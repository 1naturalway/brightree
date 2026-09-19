<?php

namespace Brightree\Types;

use Brightree\Enums\ItemSortFields;
use Brightree\Enums\SortOrder;

/**
 * Generated from the ItemSortParameter type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemSortParameter {
  public ?ItemSortFields $SortField = null;

  public ?SortOrder $SortOrder = null;
}
