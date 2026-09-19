<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the InsurancePrintedFormsPAR type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsurancePrintedFormsPAR {
  public ?bool $CreateNewPARForEachSalesOrderItem = null;

  public ?bool $EnforceStopDeliveryValidationForUnloggedPAR = null;

  public ?string $FaxAttention = null;

  public ?string $FaxName = null;

  public ?string $FaxNumber = null;

  public ?string $FaxPhone = null;

  public ?LookupValue $FaxRecipent = null;

  public ?bool $ItemSpecificPARRequired = null;

  public ?float $PARAmount = null;

  public ?LookupValue $PARAmountBasedOn = null;

  public ?LookupValue $PARForm = null;

  public ?LookupValue $PARLimitBasedOn = null;

  public ?bool $PARRequiredBasedOnAmount = null;

  public ?float $PARRequiredValidationsPerHCPC = null;

  public ?float $PARRequiredValidationsPerItem = null;

  public ?float $PARRequiredValidationsPerOrder = null;
}
