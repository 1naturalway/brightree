<?php

namespace Brightree\Enums;

/**
 * Generated from the EmergencyContactTypeEnum type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum EmergencyContactTypeEnum: string {
  case None = 'None';
  case Spouse = 'Spouse';
  case Child = 'Child';
  case Other = 'Other';
  case LifePartner = 'LifePartner';
  case Friend = 'Friend';
  case Neighbor = 'Neighbor';
  case Sibling = 'Sibling';
  case ParentValue = 'Parent';
  case Declined = 'Declined';
}
