<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderPayorSortField type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderPayorSortField: string {
  case SOPayorKey = 'SOPayorKey';
  case PayorLvlKey = 'PayorLvlKey';
  case PolicyNbr = 'PolicyNbr';
  case PayorKey = 'PayorKey';
  case StartDt = 'StartDt';
  case EndDt = 'EndDt';
  case Verified = 'Verified';
  case InsuranceCoName = 'InsuranceCoName';
  case InsuranceCoPhone = 'InsuranceCoPhone';
}
