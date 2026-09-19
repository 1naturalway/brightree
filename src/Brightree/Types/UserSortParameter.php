<?php

namespace Brightree\Types;

use Brightree\Enums\SortOrder;
use Brightree\Enums\UserSortField;

/**
 * Generated from the UserSortParameter type in UserSecurityService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class UserSortParameter {
  public ?UserSortField $SortField = null;

  public ?SortOrder $SortOrder = null;
}
