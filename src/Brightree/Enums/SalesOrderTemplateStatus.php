<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderTemplateStatus type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderTemplateStatus: string {
  case None = 'None';
  case Active = 'Active';
  case Disabled = 'Disabled';
  case Completed = 'Completed';
  case Stopped = 'Stopped';
  case Unscheduled = 'Unscheduled';
}
