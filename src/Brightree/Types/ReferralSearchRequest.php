<?php

namespace Brightree\Types;

use Brightree\Enums\ReferralType;

/**
 * Generated from the ReferralSearchRequest type in ReferenceDataService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ReferralSearchRequest {
  public ?int $BrightreeID = null;

  public ?string $City = null;

  public ?string $FacilityName = null;

  public ?string $FirstName = null;

  public ?int $GroupID = null;

  public ?string $LastName = null;

  public ?string $PhoneNumber = null;

  public ?string $PostalCode = null;

  public ?ReferralContact $ReferralContact = null;

  public ?ReferralType $ReferralType = null;

  public ?int $ReferralTypeBrightreeID = null;

  public ?string $State = null;

  public ?string $UPIN = null;
}
