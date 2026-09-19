<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the InventoryTransferDetails type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InventoryTransferDetails extends InventoryTransactionDetails {
  /** @var string[] */
  public array $SerialNumbers = [];

  public ?LookupValue $ToLocation = null;
}
