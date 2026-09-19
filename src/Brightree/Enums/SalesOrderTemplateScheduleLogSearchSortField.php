<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderTemplateScheduleLogSearchSortField type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderTemplateScheduleLogSearchSortField: string {
  case BrightreeID = 'BrightreeID';
  case SOTemplateScheduleKey = 'SOTemplateScheduleKey';
  case RunDt = 'RunDt';
  case ErrorMessage = 'ErrorMessage';
  case CreatedSOKey = 'CreatedSOKey';
  case SOTemplateKey = 'SOTemplateKey';
}
