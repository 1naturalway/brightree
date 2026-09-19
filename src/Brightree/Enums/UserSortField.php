<?php

namespace Brightree\Enums;

/**
 * Generated from the UserSortField type in UserSecurityService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum UserSortField: string {
  case BrightreeID = 'BrightreeID';
  case FirstName = 'FirstName';
  case LastName = 'LastName';
  case LoginName = 'LoginName';
  case EmailAddress = 'EmailAddress';
  case Inactive = 'Inactive';
  case EmployeeID = 'EmployeeID';
}
