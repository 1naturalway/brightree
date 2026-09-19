<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\PickupExchangeStatus;

/**
 * Generated from the PickupExchangeGeneralInfo type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangeGeneralInfo {
  public ?LookupValue $Branch = null;

  public ?string $FinalBillDate = null;

  public ?LookupValue $InventoryLocation = null;

  public ?LookupValue $PickupExchangeReason = null;

  public ?string $RequestedByName = null;

  public ?PickupExchangeStatus $Status = null;
}
