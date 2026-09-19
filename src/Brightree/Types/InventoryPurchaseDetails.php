<?php

namespace Brightree\Types;

use Brightree\Types\Inventory\SerialNumberInfo;

/**
 * Generated from the InventoryPurchaseDetails type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InventoryPurchaseDetails extends InventoryTransactionDetails {
  public ?int $Quantity = null;

  /** @var SerialNumberInfo[] */
  public array $SerialNumberInfo = [];

  public ?float $UnitAmount = null;
}
