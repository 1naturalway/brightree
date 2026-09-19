<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\UserTaskSeverity;
use Brightree\Enums\UserTaskState;
use Brightree\Enums\UserTaskStatus;

/**
 * Generated from the FacilityNote type in ReferenceDataService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class FacilityNote {
  public ?string $ActualDate = null;

  public ?LookupValue $AssignedTo = null;

  public ?string $ClosedDate = null;

  public ?string $CreateDate = null;

  public ?LookupValue $CreatedBy = null;

  public ?string $Description = null;

  public ?int $FacilityBrightreeID = null;

  public ?int $FacilityNoteBrightreeID = null;

  public ?bool $Inactive = null;

  public ?LookupValue $LockBy = null;

  public ?string $LockDate = null;

  public ?FacilityNoteReason $Reason = null;

  public ?UserTaskSeverity $Severity = null;

  public ?UserTaskState $State = null;

  public ?UserTaskStatus $Status = null;

  public ?string $Subject = null;

  public ?string $UserDefined1 = null;

  public ?string $UserDefined2 = null;
}
