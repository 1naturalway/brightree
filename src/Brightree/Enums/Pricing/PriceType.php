<?php

namespace Brightree\Enums\Pricing;

/**
 * Generated from the PriceType type in PricingService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PriceType: string {
  case Purchase = 'Purchase';
  case Rental = 'Rental';
}
