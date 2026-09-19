<?php

namespace Brightree\Types;

use Brightree\Enums\BillScheduleType;
use Brightree\Enums\MonthFlags;
use Brightree\Enums\WeekdayFlags;

/**
 * Generated from the SalesOrderTemplateScheduleSearchRequest type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateScheduleSearchRequest {
  public ?BillScheduleType $BillScheduleType = null;

  public ?int $BrightreeID = null;

  public ?string $Description = null;

  public ?int $EndPeriod = null;

  public ?bool $IsDisabled = null;

  public ?string $LastRunDate = null;

  public ?string $LastRunDateRangeEnd = null;

  public ?string $LastRunDateRangeStart = null;

  public ?MonthFlags $MonthFlags = null;

  public ?bool $MonthType = null;

  public ?string $NextRunDate = null;

  public ?string $NextRunDateRangeEnd = null;

  public ?string $NextRunDateRangeStart = null;

  public ?int $PeriodsRan = null;

  public ?int $SOTemplateKey = null;

  public ?string $StartDate = null;

  public ?string $StartDateRangeEnd = null;

  public ?string $StartDateRangeStart = null;

  public ?int $TimeInterval = null;

  public ?WeekdayFlags $WeekdayFlags = null;
}
