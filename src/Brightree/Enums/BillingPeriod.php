<?php

namespace Brightree\Enums;

/**
 * Generated from the BillingPeriod type in PricingService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum BillingPeriod: string {
  case None = 'None';
  case Days = 'Days';
  case Weeks = 'Weeks';
  case Months = 'Months';
  case BiMonthly = 'BiMonthly';
  case NumberOfDays = 'NumberOfDays';
}
