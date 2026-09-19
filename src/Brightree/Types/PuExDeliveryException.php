<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\PODExceptionType;

/**
 * Generated from the PuExDeliveryException type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PuExDeliveryException {
  public ?LookupValue $DeliveryTechnician = null;

  public ?string $ExceptionDate = null;

  public ?PODExceptionType $ExceptionType = null;

  public ?string $Message = null;

  public ?int $PuExDeliveryExceptionKey = null;

  public ?int $PuExKey = null;
}
