<?php

namespace Brightree\Types;

use Brightree\Enums\CommercialPayerSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the CommercialPayerSortParameter type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class CommercialPayerSortParameter {
  public ?CommercialPayerSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
