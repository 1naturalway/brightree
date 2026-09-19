<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the PtAdditionalContact type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PtAdditionalContact {
  public ?bool $Active = null;

  public ?string $AddressLine1 = null;

  public ?string $AddressLine2 = null;

  public ?int $BrightreePatientContactKey = null;

  public ?string $City = null;

  public ?LookupValue $ContactType = null;

  public ?string $Country = null;

  public ?string $EmailAddress = null;

  public ?string $FaxNumber = null;

  public ?string $FirstName = null;

  public ?string $LastName = null;

  public ?string $MiddleName = null;

  public ?string $MobilePhone = null;

  public ?string $Note = null;

  public ?int $PatientBrightreeID = null;

  public ?string $PhoneNumber = null;

  public ?string $PostalCode = null;

  public ?LookupValue $PreferredMethodOfContact = null;

  public ?LookupValue $Relationship = null;

  public ?string $State = null;
}
