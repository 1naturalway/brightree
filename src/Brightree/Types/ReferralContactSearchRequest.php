<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the ReferralContactSearchRequest type in ReferenceDataService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ReferralContactSearchRequest {
  public ?int $BrightreeID = null;

  public ?LookupValue $ContactType = null;

  public ?LookupValue $Department = null;

  public ?string $Email = null;

  public ?string $ExternalID = null;

  public ?string $FirstName = null;

  public ?string $LastName = null;

  public ?string $PhoneNumber = null;
}
