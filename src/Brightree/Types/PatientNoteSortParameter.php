<?php

namespace Brightree\Types;

use Brightree\Enums\PatientNoteSortField;
use Brightree\Enums\SortOrder;

/**
 * Generated from the PatientNoteSortParameter type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PatientNoteSortParameter {
  public ?PatientNoteSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
