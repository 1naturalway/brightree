<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderTemplateScheduleSearchSortField type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderTemplateScheduleSearchSortField: string {
  case BrightreeID = 'BrightreeID';
  case SOTemplateKey = 'SOTemplateKey';
  case BillSchedTypeKey = 'BillSchedTypeKey';
  case BillSchedTypeName = 'BillSchedTypeName';
  case StartDt = 'StartDt';
  case LastRunDt = 'LastRunDt';
  case NextRunDt = 'NextRunDt';
  case TimeInterval = 'TimeInterval';
  case MonthType = 'MonthType';
  case Descr = 'Descr';
  case PeriodsRan = 'PeriodsRan';
  case EndPeriod = 'EndPeriod';
  case IsDisabled = 'IsDisabled';
  case WeekdayFlags = 'WeekdayFlags';
  case MonthFlags = 'MonthFlags';
}
