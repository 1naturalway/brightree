<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the ItemGroup type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemGroup extends LookupValue {
  public ?string $Description = null;

  public ?int $ParentGroupID = null;

  public ?int $TaxZoneID = null;
}
