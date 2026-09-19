<?php

namespace Brightree\Types;

use Brightree\Enums\DoctorSortFields;
use Brightree\Enums\SortOrder;

/**
 * Generated from the DoctorSortParameter type in DoctorService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class DoctorSortParameter {
  public ?DoctorSortFields $SortField = null;

  public ?SortOrder $SortOrder = null;
}
