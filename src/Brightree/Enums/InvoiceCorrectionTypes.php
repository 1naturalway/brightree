<?php

namespace Brightree\Enums;

/**
 * Generated from the InvoiceCorrectionTypes type in InvoiceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum InvoiceCorrectionTypes: string {
  case None = 'None';
  case Correction = 'Correction';
  case Void = 'Void';
}
