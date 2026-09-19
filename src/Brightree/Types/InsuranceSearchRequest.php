<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\CoverageTypeValue;

/**
 * Generated from the InsuranceSearchRequest type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceSearchRequest {
  public ?string $Address = null;

  public ?int $BrightreeID = null;

  public ?string $City = null;

  public ?LookupValue $Company = null;

  public ?CoverageTypeValue $CoverageType = null;

  public ?string $ExternalID = null;

  public ?LookupValue $Group = null;

  public ?bool $Inactive = null;

  public ?int $InsuranceID = null;

  public ?string $InsuranceName = null;

  public ?LookupValue $PlanType = null;

  public ?LookupValue $PriceTable = null;

  public ?LookupValue $State = null;
}
