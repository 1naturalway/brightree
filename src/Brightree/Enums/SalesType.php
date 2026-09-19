<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesType type in InventoryService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesType: string {
  case Purchase = 'Purchase';
  case Rental = 'Rental';
  case PurchaseAndRental = 'PurchaseAndRental';
}
