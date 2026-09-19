<?php

namespace Brightree\Types;

use Brightree\Enums\ProgressNoteSortField;

/**
 * Generated from the ProgressNoteSortParameter type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ProgressNoteSortParameter extends BaseNoteSortParameter {
  public ?ProgressNoteSortField $SortField = null;
}
