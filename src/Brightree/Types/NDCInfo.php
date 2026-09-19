<?php

namespace Brightree\Types;

use Brightree\Enums\NDCUoM;

/**
 * Generated from the NDCInfo type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class NDCInfo {
  public ?NDC $NDC = null;

  public ?NDCUoM $NDCUoM = null;
}
