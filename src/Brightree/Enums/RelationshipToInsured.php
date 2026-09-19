<?php

namespace Brightree\Enums;

/**
 * Generated from the RelationshipToInsured type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum RelationshipToInsured: string {
  case None = 'None';
  case SelfValue = 'Self';
  case Spouse = 'Spouse';
  case Child = 'Child';
  case Other = 'Other';
  case Employee = 'Employee';
  case OrganDonor = 'OrganDonor';
  case CadaverDonor = 'CadaverDonor';
  case LifePartner = 'LifePartner';
  case Unknown = 'Unknown';
}
