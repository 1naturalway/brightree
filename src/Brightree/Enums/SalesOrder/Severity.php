<?php

namespace Brightree\Enums\SalesOrder;

/**
 * Generated from the Severity type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum Severity: string {
  case Informational = 'Informational';
  case Warning = 'Warning';
  case Error = 'Error';
}
