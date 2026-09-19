<?php

namespace Brightree\Enums;

/**
 * Generated from the AutoCrossover type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum AutoCrossover: string {
  case NeverCrossover = 'NeverCrossover';
  case AlwaysCrossover = 'AlwaysCrossover';
  case UsePrimaryERN = 'UsePrimaryERN';
}
