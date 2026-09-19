<?php

namespace Brightree\Types;

/**
 * Generated from the FacilityResidentInfo type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class FacilityResidentInfo {
  public ?string $ExternalID = null;

  public ?FacilityResidentClinicalInfo $FacilityResidentClinicalInfo = null;

  public ?FacilityResidentGeneralInfo $FacilityResidentGeneralInfo = null;

  public ?FacilityResidentInsuranceInfo $FacilityResidentInsuranceInfo = null;
}
