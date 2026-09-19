<?php

namespace Brightree\Enums;

/**
 * Generated from the DoctorSortFields type in DoctorService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum DoctorSortFields: string {
  case BrightreeID = 'BrightreeID';
  case ExternalID = 'ExternalID';
  case FirstName = 'FirstName';
  case LastName = 'LastName';
  case FullName = 'FullName';
  case FacilityID = 'FacilityID';
  case Facility = 'Facility';
  case NPI = 'NPI';
  case PhoneNumber = 'PhoneNumber';
  case FaxNumber = 'FaxNumber';
  case City = 'City';
  case ZipCode = 'ZipCode';
  case Address1 = 'Address1';
  case Address2 = 'Address2';
  case UPIN = 'UPIN';
  case Inactive = 'Inactive';
}
