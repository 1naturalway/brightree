<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the PickupExchangePayorSearchRequest type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangePayorSearchRequest {
  public ?string $ConfirmDtEnd = null;

  public ?string $ConfirmDtStart = null;

  public ?string $EndDateTime = null;

  public ?string $InsuranceCompanyName = null;

  public ?string $InsuranceCompanyPhone = null;

  public ?LookupValue $Patient = null;

  public ?int $PayorKey = null;

  public ?LookupValue $PayorLevel = null;

  public ?string $PolicyNumber = null;

  public ?int $PuExDtlKey = null;

  public ?int $PuExKey = null;

  public ?string $StartDateTime = null;

  public ?LookupValue $Status = null;

  public ?bool $Verified = null;
}
