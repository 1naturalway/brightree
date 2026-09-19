<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderTemplateType type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderTemplateType: string {
  case Unknown = 'Unknown';
  case Standard = 'Standard';
  case BrightreeConnect = 'BrightreeConnect';
  case Pharmacy = 'Pharmacy';
  case Wound = 'Wound';
  case Intake = 'Intake';
}
