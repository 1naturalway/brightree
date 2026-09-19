<?php

namespace Brightree\Enums;

/**
 * Generated from the SpanDateHoldType type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SpanDateHoldType: string {
  case None = 'None';
  case AllPurchaseAndRental = 'AllPurchaseAndRental';
  case AllPurchase = 'AllPurchase';
  case AllRental = 'AllRental';
  case UseInclusions = 'UseInclusions';
}
