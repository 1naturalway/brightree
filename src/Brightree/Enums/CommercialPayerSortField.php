<?php

namespace Brightree\Enums;

/**
 * Generated from the CommercialPayerSortField type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum CommercialPayerSortField: string {
  case PayerID = 'PayerID';
  case PayerName = 'PayerName';
  case LineOfBusinesses = 'LineOfBusinesses';
}
