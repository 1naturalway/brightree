<?php

namespace Brightree\Enums;

/**
 * Generated from the EPSDTCertificationCondInd type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum EPSDTCertificationCondInd: string {
  case None = 'None';
  case No = 'No';
  case Yes = 'Yes';
}
