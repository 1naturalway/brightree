<?php

namespace Brightree\Enums;

/**
 * Generated from the TypeCodes type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum TypeCodes: string {
  case None = 'None';
  case Unknown = 'Unknown';
  case Commercial = 'Commercial';
  case MedicareConditionallyPrimary = 'MedicareConditionallyPrimary';
  case GroupPolicy = 'GroupPolicy';
  case HMO = 'HMO';
  case IndividalPolicy = 'IndividalPolicy';
  case LongTermPolicy = 'LongTermPolicy';
  case Litigation = 'Litigation';
  case MedicarePartB = 'MedicarePartB';
  case Medicaid = 'Medicaid';
  case MedigapPartB = 'MedigapPartB';
  case MedicarePrimary = 'MedicarePrimary';
  case Other = 'Other';
  case PersonalPayment = 'PersonalPayment';
  case SupplementalPolicy = 'SupplementalPolicy';
}
