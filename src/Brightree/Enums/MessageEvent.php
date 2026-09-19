<?php

namespace Brightree\Enums;

/**
 * Generated from the MessageEvent type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum MessageEvent: string {
  case None = 'None';
  case StopConfirmation = 'StopConfirmation';
  case StopDelivery = 'StopDelivery';
}
