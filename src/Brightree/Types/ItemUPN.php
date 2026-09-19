<?php

namespace Brightree\Types;

use Brightree\Enums\ProductServiceIDQualifiers;

/**
 * Generated from the ItemUPN type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemUPN {
  public ?ProductServiceIDQualifiers $CodeTypeQualifier = null;

  public ?string $ProductServiceID = null;
}
