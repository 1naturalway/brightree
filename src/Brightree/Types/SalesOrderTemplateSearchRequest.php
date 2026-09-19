<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\SalesOrderTemplateStatus;
use Brightree\Enums\SalesOrderTemplateStopTypes;
use Brightree\Enums\SalesOrderTemplateType;

/**
 * Generated from the SalesOrderTemplateSearchRequest type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateSearchRequest {
  public ?LookupValue $Branch = null;

  public ?int $BrightreeID = null;

  public ?string $CreateDateEnd = null;

  public ?string $CreateDateStart = null;

  /** @var CustomFieldSearchParam[] */
  public array $CustomFieldSalesOrderParams = [];

  /** @var CustomFieldSearchParam[] */
  public array $CustomFieldSalesOrderTemplateParams = [];

  public ?string $ExternalID = null;

  public ?bool $LastRunHasError = null;

  public ?string $NextRunDateEnd = null;

  public ?string $NextRunDateStart = null;

  public ?LookupValue $Patient = null;

  public ?string $PreviousRunDateEnd = null;

  public ?string $PreviousRunDateStart = null;

  public ?string $Reference = null;

  public ?SalesOrderTemplateStatus $Status = null;

  public ?SalesOrderTemplateStopTypes $StopType = null;

  public ?SalesOrderTemplateType $Type = null;
}
