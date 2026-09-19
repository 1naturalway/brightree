<?php

namespace Brightree\Types;

use Brightree\Enums\PatientContactType;
use Brightree\Patient\Contact;

/**
 * Generated from the PatientContact type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PatientContact extends Contact {
  public ?PatientContactType $ContactType = null;
}
