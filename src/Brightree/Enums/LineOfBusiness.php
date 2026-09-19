<?php

namespace Brightree\Enums;

/**
 * Generated from the LineOfBusiness type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum LineOfBusiness: string {
  case All = 'All';
  case ProfWorkComp = 'ProfWorkComp';
  case ProfAuto = 'ProfAuto';
  case Professional = 'Professional';
}
