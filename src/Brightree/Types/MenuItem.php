<?php

namespace Brightree\Types;

use Brightree\Enums\PermissionType;

/**
 * Generated from the MenuItem type in UserSecurityService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class MenuItem {
  public ?int $BrightreeID = null;

  public ?string $Name = null;

  public ?int $ParentMenuItemBrightreeID = null;

  public ?PermissionType $Permission = null;
}
