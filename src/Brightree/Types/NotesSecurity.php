<?php

namespace Brightree\Types;

use Brightree\Enums\PermissionType;

/**
 * Generated from the NotesSecurity type in UserSecurityService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class NotesSecurity {
  public ?PermissionType $FinancialNote = null;

  public ?PermissionType $JustificationNote = null;

  public ?PermissionType $PatientNote = null;

  public ?PermissionType $PractitionerNote = null;

  public ?PermissionType $ProgressNote = null;
}
