<?php

namespace Brightree\Enums;

/**
 * Generated from the ReferralSearchSortField type in ReferenceDataService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ReferralSearchSortField: string {
  case BrightreeID = 'BrightreeID';
  case ReferralTypeKey = 'ReferralTypeKey';
  case ReferralType = 'ReferralType';
  case ContactKey = 'ContactKey';
  case DocKey = 'DocKey';
  case FacKey = 'FacKey';
  case PtKey = 'PtKey';
  case DocGrpKey = 'DocGrpKey';
  case FacGrpKey = 'FacGrpKey';
  case PtGrpKey = 'PtGrpKey';
  case ReferralDataKey = 'ReferralDataKey';
  case Name = 'Name';
  case ContactType = 'ContactType';
  case ContactLastName = 'ContactLastName';
  case ContactFirstName = 'ContactFirstName';
  case ContactFullName = 'ContactFullName';
  case ContactEmail = 'ContactEmail';
  case Street = 'Street';
  case Suite = 'Suite';
  case City = 'City';
  case Zip = 'Zip';
  case PhnNbr1 = 'PhnNbr1';
  case PhnNbr2 = 'PhnNbr2';
  case NPI = 'NPI';
  case UPINNbr = 'UPINNbr';
}
