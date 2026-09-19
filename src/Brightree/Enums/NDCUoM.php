<?php

namespace Brightree\Enums;

/**
 * Generated from the NDCUoM type in InventoryService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum NDCUoM: string {
  case None = 'None';
  case UN = 'UN';
  case ML = 'ML';
  case ME = 'ME';
  case GR = 'GR';
  case F2 = 'F2';
}
