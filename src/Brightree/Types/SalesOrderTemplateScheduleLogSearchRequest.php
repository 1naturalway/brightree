<?php

namespace Brightree\Types;

/**
 * Generated from the SalesOrderTemplateScheduleLogSearchRequest type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateScheduleLogSearchRequest {
  public ?int $BrightreeID = null;

  public ?int $CreatedSOKey = null;

  public ?string $ErrorMessage = null;

  public ?string $RunDate = null;

  public ?string $RunDateRangeEnd = null;

  public ?string $RunDateRangeStart = null;

  public ?int $SOTemplateKey = null;

  public ?int $SOTemplateScheduleKey = null;
}
