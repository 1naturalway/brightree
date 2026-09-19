<?php

namespace Brightree\Types;

use Brightree\Enums\ItemStatusEnum;
use Brightree\Enums\SaleType;

/**
 * Generated from the ItemInfo type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemInfo {
  public ?int $BrightreeId = null;

  public ?string $ExternalId = null;

  public ?string $ItemId = null;

  public ?string $Name = null;

  public ?SaleType $SaleType = null;

  public ?ItemStatusEnum $Status = null;
}
