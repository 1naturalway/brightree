<?php

namespace Brightree\Enums;

/**
 * Generated from the ReferralContactSortFields type in ReferenceDataService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ReferralContactSortFields: string {
  case BrightreeID = 'BrightreeID';
  case ExternalID = 'ExternalID';
  case CoKey = 'CoKey';
  case ContactTypeKey = 'ContactTypeKey';
  case ContactSystemTypeKey = 'ContactSystemTypeKey';
  case ContactTypeName = 'ContactTypeName';
  case ContactSystemTypeName = 'ContactSystemTypeName';
  case CoName = 'CoName';
  case LastName = 'LastName';
  case FirstName = 'FirstName';
  case FullName = 'FullName';
  case Email = 'Email';
  case Street = 'Street';
  case Suite = 'Suite';
  case City = 'City';
  case Zip = 'Zip';
  case PhnNbr1 = 'PhnNbr1';
  case PhnNbr2 = 'PhnNbr2';
}
