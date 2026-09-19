<?php

namespace Brightree\Enums;

/**
 * Generated from the InvoiceStatus type in InvoiceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum InvoiceStatus: string {
  case None = 'None';
  case Open = 'Open';
  case Closed = 'Closed';
  case Pending = 'Pending';
  case OnHold = 'OnHold';
}
