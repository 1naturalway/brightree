<?php

namespace Brightree\Enums;

/**
 * Generated from the CoverageTypeValue type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum CoverageTypeValue: string {
  case All = 'All';
  case DME = 'DME';
  case MajorMedical = 'MajorMedical';
  case Pharmacy = 'Pharmacy';
}
