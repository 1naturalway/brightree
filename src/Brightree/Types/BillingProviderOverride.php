<?php

namespace Brightree\Types;

use Brightree\Enums\TaxIDTypeEnum;

/**
 * Generated from the BillingProviderOverride type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class BillingProviderOverride {
  public ?AddressInfo $BillingProviderOverrideAddress = null;

  public ?string $Company = null;

  public ?string $TaxID = null;

  public ?TaxIDTypeEnum $TaxIDType = null;
}
