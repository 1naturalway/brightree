<?php

namespace Brightree\Enums;

/**
 * Generated from the Gender type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum Gender: string {
  case NoneSpecified = 'NoneSpecified';
  case Male = 'Male';
  case Female = 'Female';
}
