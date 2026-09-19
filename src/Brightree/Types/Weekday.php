<?php

namespace Brightree\Types;

use Brightree\Enums\DayEnum;

/**
 * Generated from the Weekday type in UserSecurityService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class Weekday {
  public ?DayEnum $Day = null;

  public ?bool $Enabled = null;

  public ?string $EndTime = null;

  public ?string $StartTime = null;
}
