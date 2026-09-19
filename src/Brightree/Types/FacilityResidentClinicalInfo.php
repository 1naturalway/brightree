<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\Gender;

/**
 * Generated from the FacilityResidentClinicalInfo type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class FacilityResidentClinicalInfo {
  public ?string $DateOfDeath = null;

  public ?ICD9Info $DiagnosisCode1 = null;

  public ?ICD9Info $DiagnosisCode2 = null;

  public ?ICD9Info $DiagnosisCode3 = null;

  public ?ICD9Info $DiagnosisCode4 = null;

  public ?LookupValue $FunctionalAbility = null;

  public ?Gender $Gender = null;

  public ?float $Height = null;

  public ?bool $InfectiousCondition = null;

  public ?LookupValue $Practitioner = null;

  public ?float $Weight = null;
}
