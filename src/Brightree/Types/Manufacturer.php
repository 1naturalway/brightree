<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;

/**
 * Generated from the Manufacturer type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class Manufacturer extends LookupValue {
  public ?Address $Address = null;

  public ?ContactInfo $ContactInfo = null;

  public ?string $URL = null;
}
