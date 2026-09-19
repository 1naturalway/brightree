<?php

namespace Brightree\Enums;

/**
 * Generated from the State type in InventoryService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum State: string {
  case Locked = 'Locked';
  case Unlocked = 'Unlocked';
}
