<?php

namespace Brightree\Enums;

/**
 * Generated from the PODStatus type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PODStatus: string {
  case None = 'None';
  case Open = 'Open';
  case New = 'New';
  case Modified = 'Modified';
  case Scheduled = 'Scheduled';
  case PartiallyFulfilled = 'PartiallyFulfilled';
  case Fulfilled = 'Fulfilled';
  case OverFulfilled = 'OverFulfilled';
  case Exception = 'Exception';
  case TransferredOut = 'TransferredOut';
  case TransferredIn = 'TransferredIn';
  case Voided = 'Voided';
  case Closed = 'Closed';
  case Cancelled = 'Cancelled';
}
