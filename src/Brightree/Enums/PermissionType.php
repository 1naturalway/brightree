<?php

namespace Brightree\Enums;

/**
 * Generated from the PermissionType type in UserSecurityService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PermissionType: string {
  case Denied = 'Denied';
  case ReadOnly = 'ReadOnly';
  case FullControl = 'FullControl';
}
