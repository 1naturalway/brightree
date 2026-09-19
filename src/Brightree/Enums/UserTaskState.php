<?php

namespace Brightree\Enums;

/**
 * Generated from the UserTaskState type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum UserTaskState: string {
  case Locked = 'Locked';
  case Unlocked = 'Unlocked';
}
