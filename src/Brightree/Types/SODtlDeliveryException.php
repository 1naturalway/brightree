<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\PODExceptionType;

/**
 * Generated from the SODtlDeliveryException type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SODtlDeliveryException {
  public ?LookupValue $DeliveryTechnician = null;

  public ?string $ExceptionDate = null;

  public ?PODExceptionType $ExceptionType = null;

  public ?string $Message = null;

  public ?int $SODtlDeliveryExceptionKey = null;

  public ?int $SODtlKey = null;
}
