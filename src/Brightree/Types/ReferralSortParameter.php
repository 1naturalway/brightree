<?php

namespace Brightree\Types;

use Brightree\Enums\ReferralSearchSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the ReferralSortParameter type in ReferenceDataService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ReferralSortParameter {
  public ?ReferralSearchSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
