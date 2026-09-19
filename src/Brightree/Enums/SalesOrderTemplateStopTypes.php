<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderTemplateStopTypes type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderTemplateStopTypes: string {
  case None = 'None';
  case AutomaticEligibilityCheck = 'AutomaticEligibilityCheck';
  case IneligiblePolicy = 'IneligiblePolicy';
}
