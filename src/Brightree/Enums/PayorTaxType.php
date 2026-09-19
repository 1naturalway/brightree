<?php

namespace Brightree\Enums;

/**
 * Generated from the PayorTaxType type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PayorTaxType: string {
  case None = 'None';
  case Taxable = 'Taxable';
  case Exempt = 'Exempt';
}
