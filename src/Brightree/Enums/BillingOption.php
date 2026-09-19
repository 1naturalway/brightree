<?php

namespace Brightree\Enums;

/**
 * Generated from the BillingOption type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum BillingOption: string {
  case None = 'None';
  case Daily = 'Daily';
  case Monthly = 'Monthly';
  case MonthlyAnniversary = 'MonthlyAnniversary';
  case Yearly = 'Yearly';
}
