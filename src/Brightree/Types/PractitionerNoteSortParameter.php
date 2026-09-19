<?php

namespace Brightree\Types;

use Brightree\Enums\PractitionerNoteSortField;

/**
 * Generated from the PractitionerNoteSortParameter type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PractitionerNoteSortParameter extends BaseNoteSortParameter {
  public ?PractitionerNoteSortField $SortField = null;
}
