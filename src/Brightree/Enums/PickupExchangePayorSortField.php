<?php

namespace Brightree\Enums;

/**
 * Generated from the PickupExchangePayorSortField type in PickupExchangeService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PickupExchangePayorSortField: string {
  case PuExKey = 'PuExKey';
  case PuExDtlKey = 'PuExDtlKey';
  case PuExStatKey = 'PuExStatKey';
  case StatusName = 'StatusName';
  case ConfirmDT = 'ConfirmDT';
  case PtKey = 'PtKey';
  case PtFullName = 'PtFullName';
  case SODtlKey = 'SODtlKey';
  case SODtlPayorKey = 'SODtlPayorKey';
  case PayorLvlKey = 'PayorLvlKey';
  case PayorLvlName = 'PayorLvlName';
  case PolicyNbr = 'PolicyNbr';
  case PayorKey = 'PayorKey';
  case StartDt = 'StartDt';
  case EndDt = 'EndDt';
  case Verified = 'Verified';
  case InsuranceCoName = 'InsuranceCoName';
  case InsuranceCoPhone = 'InsuranceCoPhone';
}
