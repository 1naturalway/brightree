<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\UserTaskSeverity;
use Brightree\Enums\UserTaskState;
use Brightree\Enums\UserTaskStatus;

/**
 * Generated from the DoctorNote type in DoctorService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class DoctorNote {
  public ?string $ActualDate = null;

  public ?LookupValue $AssignedTo = null;

  public ?string $ClosedDate = null;

  public ?string $CreateDate = null;

  public ?LookupValue $CreatedBy = null;

  public ?string $Description = null;

  public ?int $DoctorBrightreeID = null;

  public ?int $DoctorNoteBrightreeID = null;

  public ?bool $Inactive = null;

  public ?LookupValue $LockBy = null;

  public ?string $LockDate = null;

  public ?DoctorNoteReason $Reason = null;

  public ?UserTaskSeverity $Severity = null;

  public ?UserTaskState $State = null;

  public ?UserTaskStatus $Status = null;

  public ?string $Subject = null;

  public ?string $UserDefined1 = null;

  public ?string $UserDefined2 = null;
}
