<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the AuditInfo type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class AuditInfo {
  public ?LookupValue $ConfirmedBy = null;

  public ?string $ConfirmedDate = null;

  public ?LookupValue $CreatedBy = null;

  public ?string $CreatedDate = null;
}
