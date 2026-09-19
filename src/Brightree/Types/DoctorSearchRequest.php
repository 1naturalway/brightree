<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the DoctorSearchRequest type in DoctorService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class DoctorSearchRequest {
  public ?string $Address1 = null;

  public ?string $Address2 = null;

  public ?int $BrightreeID = null;

  public ?string $City = null;

  public ?string $DEANumber = null;

  public ?LookupValue $DoctorGroup = null;

  public ?string $ExternalID = null;

  public ?LookupValue $Facility = null;

  public ?string $FaxNumber = null;

  public ?string $FirstName = null;

  public ?string $FullName = null;

  public ?bool $Inactive = null;

  public ?string $LastName = null;

  public ?string $LicenseExpiration = null;

  public ?string $LicenseExpirationEnd = null;

  public ?string $LicenseExpirationStart = null;

  public ?string $LicenseNumber = null;

  public ?LookupValue $MarketingRep = null;

  public ?string $NPI = null;

  public ?string $PhoneNumber = null;

  public ?LookupValue $State = null;

  public ?string $UPIN = null;

  public ?string $User1 = null;

  public ?string $User2 = null;

  public ?string $ZipCode = null;
}
