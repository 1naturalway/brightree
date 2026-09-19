<?php

namespace Brightree\Types;

use Brightree\Enums\CommercialEligibilityPayerSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the CommercialEligibilityPayerSortParameter type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class CommercialEligibilityPayerSortParameter {
  public ?CommercialEligibilityPayerSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
