<?php

namespace Brightree\Enums;

/**
 * Generated from the EntityType type in DocumentManagementService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum EntityType: string {
  case SalesOrder = 'SalesOrder';
  case PickupExchange = 'PickupExchange';
  case Patient = 'Patient';
  case CMN = 'CMN';
  case Quote = 'Quote';
  case PAR = 'PAR';
  case Rx = 'Rx';
}
