<?php

namespace Brightree\Types;

use Brightree\Enums\SalesOrderTemplateType;
use Brightree\SalesOrder\SalesOrderGeneralInfo;

/**
 * Generated from the SalesOrderTemplateGeneralInfo type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateGeneralInfo extends SalesOrderGeneralInfo {
  public ?SalesOrderTemplateType $TemplateType = null;
}
