<?php

namespace Brightree\Types;

use Brightree\Enums\ReferralContactSortFields;
use Brightree\Enums\SortOrder;

/**
 * Generated from the ReferralContactSortParameter type in ReferenceDataService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ReferralContactSortParameter {
  public ?ReferralContactSortFields $SortField = null;

  public ?SortOrder $SortOrder = null;
}
