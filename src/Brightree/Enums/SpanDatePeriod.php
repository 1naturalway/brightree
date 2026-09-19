<?php

namespace Brightree\Enums;

/**
 * Generated from the SpanDatePeriod type in PricingService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SpanDatePeriod: string {
  case None = 'None';
  case Days = 'Days';
  case Weeks = 'Weeks';
}
