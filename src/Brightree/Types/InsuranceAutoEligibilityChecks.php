<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the InsuranceAutoEligibilityChecks type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceAutoEligibilityChecks {
  public ?LookupValue $EligibilityFrequency = null;

  public ?bool $IncludeMedicareDeductibleHolds = null;

  public ?bool $UseCustomEligibilityFrequency = null;
}
