<?php

namespace Brightree\Types;

use Brightree\Enums\PatientPhoneSearchSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the PatientPhoneSearchSortParameter type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PatientPhoneSearchSortParameter {
  public ?PatientPhoneSearchSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
