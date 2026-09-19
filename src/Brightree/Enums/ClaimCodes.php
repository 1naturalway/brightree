<?php

namespace Brightree\Enums;

/**
 * Generated from the ClaimCodes type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ClaimCodes: string {
  case None = 'None';
  case SelfPay = 'SelfPay';
  case CentralCertification = 'CentralCertification';
  case OtherNonFederalPrograms = 'OtherNonFederalPrograms';
  case PPO = 'PPO';
  case POS = 'POS';
  case EPO = 'EPO';
  case IndemnityInsurance = 'IndemnityInsurance';
  case HMOMedicareRisk = 'HMOMedicareRisk';
  case AutomobileMedical = 'AutomobileMedical';
  case BlueCrossBlueShield = 'BlueCrossBlueShield';
  case Champus = 'Champus';
  case CommercialInsuranceCo = 'CommercialInsuranceCo';
  case Disability = 'Disability';
  case HMO = 'HMO';
  case Liability = 'Liability';
  case LiabilityMedical = 'LiabilityMedical';
  case MedicarePartB = 'MedicarePartB';
  case Medicaid = 'Medicaid';
  case OtherFederalProgram = 'OtherFederalProgram';
  case TitleV = 'TitleV';
  case VeteranAdministrationPlan = 'VeteranAdministrationPlan';
  case WorkersCompensation = 'WorkersCompensation';
  case ZZ = 'ZZ';
}
