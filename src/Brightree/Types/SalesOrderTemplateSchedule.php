<?php

namespace Brightree\Types;

use Brightree\Enums\BillScheduleType;
use Brightree\Enums\MonthFlags;
use Brightree\Enums\WeekdayFlags;

/**
 * Generated from the SalesOrderTemplateSchedule type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateSchedule {
  public ?BillScheduleType $BillScheduleType = null;

  public ?int $BrightreeID = null;

  public ?string $DelayDate = null;

  public ?string $Descr = null;

  public ?int $EndPeriod = null;

  public ?bool $IsDisabled = null;

  public ?string $LastRunDate = null;

  public ?MonthFlags $MonthFlags = null;

  public ?bool $MonthType = null;

  public ?string $NextRunDate = null;

  public ?int $PeriodsRan = null;

  public ?int $SOTemplateKey = null;

  public ?string $StartDate = null;

  public ?int $TimeInterval = null;

  public ?WeekdayFlags $WeekdayFlags = null;
}
