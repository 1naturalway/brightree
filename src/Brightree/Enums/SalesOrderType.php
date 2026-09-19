<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderType type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderType: string {
  case None = 'None';
  case Standard = 'Standard';
  case InitialLoad = 'InitialLoad';
  case Retail = 'Retail';
  case CreatedViaScheduler = 'CreatedViaScheduler';
}
