<?php

namespace Brightree\Types;

/**
 * Generated from the UserGroup type in UserSecurityService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class UserGroup {
  public ?int $BrightreeID = null;

  public ?UserGroupMainInfo $UserGroupMainInfo = null;

  public ?UserGroupSecurityInfo $UserGroupSecurityInfo = null;

  public ?WeekdayInfo $WeekdayInfo = null;
}
