<?php

namespace Brightree\Enums;

/**
 * Generated from the InsuranceSortFields type in InsuranceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum InsuranceSortFields: string {
  case InsuranceID = 'InsuranceID';
  case InsuranceName = 'InsuranceName';
  case Address = 'Address';
}
