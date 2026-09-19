<?php

namespace Brightree\Enums;

/**
 * Generated from the ClaimPrg type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ClaimPrg: string {
  case Medicare = 'Medicare';
  case Medicaid = 'Medicaid';
  case CHAMPUS = 'CHAMPUS';
  case CHAMPVA = 'CHAMPVA';
  case GroupHealthPlan = 'GroupHealthPlan';
  case FecaBlackLung = 'FecaBlackLung';
  case Other = 'Other';
}
