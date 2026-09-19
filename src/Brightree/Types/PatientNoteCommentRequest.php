<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the PatientNoteCommentRequest type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PatientNoteCommentRequest {
  public ?string $ActualDate = null;

  public ?string $CommentText = null;

  public ?LookupValue $CreatedBy = null;
}
