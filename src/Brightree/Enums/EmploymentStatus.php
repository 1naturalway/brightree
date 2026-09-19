<?php

namespace Brightree\Enums;

/**
 * Generated from the EmploymentStatus type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum EmploymentStatus: string {
  case None = 'None';
  case Employed = 'Employed';
  case FullTimeStudent = 'FullTimeStudent';
  case PartTimeStudent = 'PartTimeStudent';
  case Unemployed = 'Unemployed';
}
