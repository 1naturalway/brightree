<?php

namespace Brightree\Enums;

/**
 * Generated from the TestingFrequencyEnum type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum TestingFrequencyEnum: string {
  case None = 'None';
  case Daily = 'Daily';
  case Weekly = 'Weekly';
}
