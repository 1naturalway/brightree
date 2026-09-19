<?php

namespace Brightree\Types;

use Brightree\Enums\Period;

/**
 * Generated from the SalesOrderTemplateItemFrequency type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateItemFrequency {
  public ?int $BrightreeDetailID = null;

  public ?int $BrightreeID = null;

  public ?int $DaysSupply = null;

  public ?int $HowMany = null;

  public ?int $Interval = null;

  public ?Period $Period = null;
}
