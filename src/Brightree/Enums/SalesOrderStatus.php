<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderStatus type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderStatus: string {
  case None = 'None';
  case NewSalesOrder = 'NewSalesOrder';
  case Active = 'Active';
  case OnHold = 'OnHold';
  case Delivered = 'Delivered';
  case Closed = 'Closed';
  case Stopped = 'Stopped';
}
