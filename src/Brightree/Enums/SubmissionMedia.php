<?php

namespace Brightree\Enums;

/**
 * Generated from the SubmissionMedia type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SubmissionMedia: string {
  case None = 'None';
  case Print = 'Print';
  case Electronic = 'Electronic';
  case NCPDP = 'NCPDP';
}
