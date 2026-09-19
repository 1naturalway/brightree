<?php

namespace Brightree\Enums;

/**
 * Generated from the UserTaskSeverity type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum UserTaskSeverity: string {
  case Low = 'Low';
  case Medium = 'Medium';
  case High = 'High';
  case Critical = 'Critical';
}
