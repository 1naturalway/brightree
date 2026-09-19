<?php

namespace Brightree\Enums;

/**
 * Generated from the QMBStatus type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum QMBStatus: string {
  case NonMedicarePolicy = 'NonMedicarePolicy';
  case CheckEligibility = 'CheckEligibility';
  case NotQMB = 'NotQMB';
  case Active = 'Active';
  case Inactive = 'Inactive';
}
