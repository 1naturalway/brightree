<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\PODExceptionType;

/**
 * Generated from the PuExDtlDeliveryException type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PuExDtlDeliveryException {
  public ?LookupValue $DeliveryTechnician = null;

  public ?string $ExceptionDate = null;

  public ?PODExceptionType $ExceptionType = null;

  public ?string $Message = null;

  public ?int $PuExDtlDeliveryExceptionKey = null;

  public ?int $PuExDtlKey = null;
}
