<?php

namespace Brightree\Enums;

/**
 * Generated from the PickupExchangeStatus type in PickupExchangeService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PickupExchangeStatus: string {
  case None = 'None';
  case New = 'New';
  case Confirmed = 'Confirmed';
}
