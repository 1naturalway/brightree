<?php

namespace Brightree\Enums;

/**
 * Generated from the DayEnum type in UserSecurityService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum DayEnum: string {
  case Monday = 'Monday';
  case Tuesday = 'Tuesday';
  case Wednesday = 'Wednesday';
  case Thursday = 'Thursday';
  case Friday = 'Friday';
  case Saturday = 'Saturday';
  case Sunday = 'Sunday';
}
