<?php

namespace Brightree\Enums;

/**
 * Generated from the PayorLevel type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PayorLevel: string {
  case None = 'None';
  case Primary = 'Primary';
  case Secondary = 'Secondary';
  case Tertiary = 'Tertiary';
  case Patient = 'Patient';
}
