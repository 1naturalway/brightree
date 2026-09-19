<?php

namespace Brightree\Types;

use Brightree\Enums\AdjustmentType;
use Brightree\Types\Inventory\SerialNumberInfo;

/**
 * Generated from the InventoryAdjustmentDetails type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InventoryAdjustmentDetails extends InventoryTransactionDetails {
  public ?AdjustmentType $AdjustmentType = null;

  public ?int $Quantity = null;

  /** @var SerialNumberInfo[] */
  public array $SerialNumberInfo = [];

  public ?float $UnitAmount = null;
}
