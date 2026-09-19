<?php

namespace Brightree\Types;

use Brightree\Enums\InsuranceSortFields;
use Brightree\Enums\SortOrder;

/**
 * Generated from the InsuranceSortParameter type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceSortParameter {
  public ?InsuranceSortFields $SortField = null;

  public ?SortOrder $SortOrder = null;
}
