<?php

namespace Brightree\Types;

use Brightree\Enums\JustificationNoteSortField;

/**
 * Generated from the JustificationNoteSortParameter type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class JustificationNoteSortParameter extends BaseNoteSortParameter {
  public ?JustificationNoteSortField $SortField = null;
}
