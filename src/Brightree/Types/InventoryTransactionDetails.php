<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the InventoryTransactionDetails type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InventoryTransactionDetails {
  public ?LookupValue $FromLocation = null;

  /** @var LotInfo[] */
  public array $Lots = [];

  public ?string $Note = null;
}
