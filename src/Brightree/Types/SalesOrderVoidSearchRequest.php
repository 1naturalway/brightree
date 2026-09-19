<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\SalesOrderType;

/**
 * Generated from the SalesOrderVoidSearchRequest type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderVoidSearchRequest {
  public ?LookupValue $Branch = null;

  public ?int $BrightreeID = null;

  public ?string $CreateDateTimeEnd = null;

  public ?string $CreateDateTimeStart = null;

  /** @var CustomFieldSearchParam[] */
  public array $CustomFieldSearchParams = [];

  public ?LookupValue $DeliveryTechnician = null;

  public ?LookupValue $Facility = null;

  public ?LookupValue $Patient = null;

  public ?string $PrintDateTimeEnd = null;

  public ?string $PrintDateTimeStart = null;

  public ?string $Reference = null;

  public ?int $SalesOrderBrightreeID = null;

  public ?string $ScheduledDeliveryDateTimeEnd = null;

  public ?string $ScheduledDeliveryDateTimeStart = null;

  public ?SalesOrderType $Type = null;

  public ?LookupValue $VoidReason = null;

  public ?LookupValue $VoidedBy = null;

  public ?string $VoidedDateTimeEnd = null;

  public ?string $VoidedDateTimeStart = null;
}
