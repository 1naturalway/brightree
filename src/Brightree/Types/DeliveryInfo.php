<?php

namespace Brightree\Types;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;

/**
 * Generated from the DeliveryInfo type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class DeliveryInfo {
  public ?Address $Address = null;

  public ?ContactInfo $ContactInfo = null;

  public ?string $DeliveryNote = null;
}
