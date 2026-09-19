<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\UserTaskSeverity;
use Brightree\Enums\UserTaskState;
use Brightree\Enums\UserTaskStatus;

/**
 * Generated from the PatientNote type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PatientNote {
  public ?bool $AcknowledgementRequired = null;

  public ?string $ActualDate = null;

  public ?LookupValue $AssignedTo = null;

  /** @var AssociatedInvoice[] */
  public array $AssociatedInvoices = [];

  /** @var AssociatedSalesOrder[] */
  public array $AssociatedSalesOrders = [];

  public ?string $ClosedDate = null;

  public ?string $CreateDate = null;

  public ?LookupValue $CreatedBy = null;

  public ?string $Description = null;

  public ?bool $Inactive = null;

  public ?string $LockDate = null;

  public ?LookupValue $LockedBy = null;

  public ?string $NeedDate = null;

  public ?int $PatientKey = null;

  public ?int $PatientNoteKey = null;

  public ?PatientNoteReason $Reason = null;

  public ?UserTaskSeverity $Severity = null;

  public ?UserTaskState $State = null;

  public ?UserTaskStatus $Status = null;

  public ?string $Subject = null;

  public ?string $UserDefined1 = null;

  public ?string $UserDefined2 = null;
}
