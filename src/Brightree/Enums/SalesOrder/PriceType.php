<?php

namespace Brightree\Enums\SalesOrder;

/**
 * Generated from the PriceType type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PriceType: string {
  case None = 'None';
  case Purchase = 'Purchase';
  case Rental = 'Rental';
}
