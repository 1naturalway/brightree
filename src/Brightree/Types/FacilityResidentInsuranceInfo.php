<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\WorkersCompensation;
use Brightree\Enums\EmploymentStatus;
use Brightree\Enums\MaritalStatus;

/**
 * Generated from the FacilityResidentInsuranceInfo type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class FacilityResidentInsuranceInfo {
  public ?EmploymentStatus $EmploymentStatus = null;

  public ?MaritalStatus $MaritalStatus = null;

  public ?bool $PrintAmountOnDeliveryTicket = null;

  public ?WorkersCompensation $workersCompensation = null;
}
