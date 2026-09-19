<?php

namespace Brightree\Enums;

/**
 * Generated from the PriceTableType type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PriceTableType: string {
  case None = 'None';
  case Commercial = 'Commercial';
  case Retail = 'Retail';
  case Medicare = 'Medicare';
}
