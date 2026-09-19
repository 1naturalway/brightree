<?php

namespace Brightree\Enums;

/**
 * Generated from the DiagType type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum DiagType: string {
  case Unknown = 'Unknown';
  case ICD9 = 'ICD9';
  case ICD10 = 'ICD10';
}
