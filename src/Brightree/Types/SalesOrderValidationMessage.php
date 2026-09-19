<?php

namespace Brightree\Types;

use Brightree\Enums\MessageEvent;
use Brightree\Enums\SalesOrder\Severity;

/**
 * Generated from the SalesOrderValidationMessage type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderValidationMessage {
  public ?bool $ErrorCanBeOverridden = null;

  public ?bool $ErrorHasBeenOverridden = null;

  public ?string $MessageCode = null;

  public ?MessageEvent $MessageEvent = null;

  public ?Severity $Severity = null;
}
