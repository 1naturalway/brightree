<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\eClaimsTransmissionType;

/**
 * Generated from the InsuranceEClaimsCarrier type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceEClaimsCarrier {
  public ?LookupValue $CarrierType = null;

  public ?LookupValue $CommercialPayor = null;

  public ?eClaimsTransmissionType $TransmissionType = null;

  public ?LookupValue $ValidationRuleSet = null;
}
