<?php

namespace Brightree\Types;

/**
 * Generated from the SalesOrderWIPStatusUpdateRequest type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderWIPStatusUpdateRequest {
  public ?int $BranchKey = null;

  public ?int $PatientKey = null;

  public ?string $WipDateNeededEnd = null;

  public ?string $WipDateNeededStart = null;
}
