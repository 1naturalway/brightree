<?php

namespace Brightree\Enums;

/**
 * Generated from the PatientPhoneSearchSortField type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PatientPhoneSearchSortField: string {
  case PtKey = 'PtKey';
  case PtId = 'PtId';
  case PriorSystemKey = 'PriorSystemKey';
  case FullName = 'FullName';
  case PhoneNumber = 'PhoneNumber';
  case PhoneType = 'PhoneType';
}
