<?php

namespace Brightree\Enums;

/**
 * Generated from the PatientContactType type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PatientContactType: string {
  case Emergency = 'Emergency';
  case ResponsibleParty = 'ResponsibleParty';
}
