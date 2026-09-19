<?php

namespace Brightree\Enums;

/**
 * Generated from the PhoneTypes type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PhoneTypes: string {
  case DeliveryPhone = 'DeliveryPhone';
  case BillingPhone = 'BillingPhone';
  case BillingMobilePhone = 'BillingMobilePhone';
  case EmergencyContactPhone = 'EmergencyContactPhone';
  case EmergencyContactMobilePhone = 'EmergencyContactMobilePhone';
  case ResponsiblePartyPhone = 'ResponsiblePartyPhone';
  case ResponsiblePartyMobilePhone = 'ResponsiblePartyMobilePhone';
}
