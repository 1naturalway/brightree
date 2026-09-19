<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\PODExceptionType;

/**
 * Generated from the SODeliveryException type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SODeliveryException {
  public ?LookupValue $DeliveryTechnician = null;

  public ?string $ExceptionDate = null;

  public ?PODExceptionType $ExceptionType = null;

  public ?string $Message = null;

  public ?int $SODeliveryExceptionKey = null;

  public ?int $SOKey = null;
}
