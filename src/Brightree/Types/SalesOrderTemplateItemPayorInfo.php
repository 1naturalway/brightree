<?php

namespace Brightree\Types;

use Brightree\Enums\PayorLevel;
use Brightree\Enums\PayorUsages;

/**
 * Generated from the SalesOrderTemplateItemPayorInfo type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateItemPayorInfo {
  public ?bool $BillForDenial = null;

  public ?string $InsuranceCoName = null;

  public ?int $PayorKey = null;

  public ?PayorLevel $PayorLevel = null;

  public ?PayorUsages $PayorUsage = null;

  public ?int $SOTemplateDtlKey = null;

  public ?int $SOTemplateKey = null;

  public ?bool $UsePayor = null;
}
