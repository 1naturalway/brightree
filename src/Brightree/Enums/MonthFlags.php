<?php

namespace Brightree\Enums;

/**
 * Generated from the MonthFlags type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum MonthFlags: string {
  case None = 'None';
  case January = 'January';
  case February = 'February';
  case March = 'March';
  case April = 'April';
  case May = 'May';
  case June = 'June';
  case July = 'July';
  case August = 'August';
  case September = 'September';
  case October = 'October';
  case November = 'November';
  case December = 'December';
}
