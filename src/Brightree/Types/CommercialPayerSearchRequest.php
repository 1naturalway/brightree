<?php

namespace Brightree\Types;

use Brightree\Enums\LineOfBusiness;

/**
 * Generated from the CommercialPayerSearchRequest type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class CommercialPayerSearchRequest {
  public ?LineOfBusiness $LineOfBusinesses = null;

  public ?string $PayerID = null;

  public ?string $PayerName = null;
}
