<?php

namespace Brightree\Enums;

/**
 * Generated from the ResponsiblePartyType type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ResponsiblePartyType: string {
  case None = 'None';
  case Spouse = 'Spouse';
  case ParentValue = 'Parent';
  case Child = 'Child';
  case Grandparent = 'Grandparent';
  case Friend = 'Friend';
  case SelfValue = 'Self';
  case Other = 'Other';
}
