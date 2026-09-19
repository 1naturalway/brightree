<?php

namespace Brightree\Enums;

/**
 * Generated from the ReferralType type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ReferralType: string {
  case None = 'None';
  case Doctor = 'Doctor';
  case Facility = 'Facility';
  case Patient = 'Patient';
  case Other = 'Other';
  case DoctorContact = 'DoctorContact';
  case FacilityContact = 'FacilityContact';
}
