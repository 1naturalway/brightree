<?php

namespace Brightree\Types;

use Brightree\Enums\ClaimPrg;
use Brightree\Enums\PayorTaxType;

/**
 * Generated from the InsuranceGeneralInfo type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceGeneralInfo {
  public ?ClaimPrg $ClaimProgram = null;

  public ?InsurancePriceTable $DefaultPriceTable = null;

  public ?bool $DiscontinuedWarning = null;

  public ?bool $EnableSecondaryBillingCodes = null;

  public ?bool $ExcludeFromHCPCSRollup = null;

  public ?InsuranceCompany $InsuranceCompany = null;

  public ?InsuranceGroup $InsuranceGroup = null;

  public ?InsurancePlanType $InsurancePlanType = null;

  public ?string $Name = null;

  public ?bool $NonCommercialPayer = null;

  public ?int $PayPercent = null;

  public ?string $PayorCode = null;

  public ?bool $PrintAmountsOnDeliveryTickets = null;

  public ?bool $TaxIncludedInAllowable = null;

  public ?PayorTaxType $TaxType = null;
}
