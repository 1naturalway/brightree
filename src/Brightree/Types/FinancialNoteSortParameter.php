<?php

namespace Brightree\Types;

use Brightree\Enums\FinancialNoteSortField;

/**
 * Generated from the FinancialNoteSortParameter type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class FinancialNoteSortParameter extends BaseNoteSortParameter {
  public ?FinancialNoteSortField $SortField = null;
}
