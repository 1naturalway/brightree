<?php

namespace Brightree\Enums;

/**
 * Generated from the PreferredMethodContactType type in DoctorService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PreferredMethodContactType: string {
  case Phone = 'Phone';
  case Mobile = 'Mobile';
  case Email = 'Email';
  case eSignature = 'eSignature';
  case Fax = 'Fax';
  case InPerson = 'InPerson';
  case EMR = 'EMR';
}
