<?php

namespace Brightree\Types;

use Brightree\Enums\PhoneTypes;

/**
 * Generated from the PatientPhoneNumberSearchRequest type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PatientPhoneNumberSearchRequest {
  public ?int $BrightreeID = null;

  public ?string $ExternalID = null;

  public ?string $FullName = null;

  public ?string $PhoneNumber = null;

  public ?PhoneTypes $PhoneType = null;
}
