<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the ItemMaintenanceNote type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemMaintenanceNote {
  public ?string $ActualDate = null;

  public ?int $BrightreeId = null;

  public ?string $CommentText = null;

  public ?LookupValue $CreatedBy = null;

  public ?string $DateCreated = null;
}
