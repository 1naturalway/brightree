<?php

namespace Brightree\Types;

use Brightree\CommonServices\Name;
use Brightree\CommonServices\ResponsibleParty;

/**
 * Generated from the FacilityResidentGeneralInfo type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class FacilityResidentGeneralInfo {
  public ?string $AccountNumber = null;

  public ?bool $AccountOnHold = null;

  public ?string $BirthDate = null;

  public ?PatientContact $EmergencyContact = null;

  public ?bool $HIPAASignatureOnFile = null;

  public ?Name $Name = null;

  public ?ResponsibleParty $ResponsibleParty = null;

  public ?string $SSN = null;
}
