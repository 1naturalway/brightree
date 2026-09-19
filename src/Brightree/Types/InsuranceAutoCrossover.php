<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\AutoCrossover;

/**
 * Generated from the InsuranceAutoCrossover type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceAutoCrossover {
  public ?AutoCrossover $AutoCrossover = null;

  public ?LookupValue $PaymentReason = null;

  public ?LookupValue $PaymentType = null;

  public ?bool $SuppressSubmissionOfSecondaryClaim = null;
}
