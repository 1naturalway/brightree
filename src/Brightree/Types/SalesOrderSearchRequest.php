<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\SalesOrderStatus;
use Brightree\Enums\SalesOrderType;

/**
 * Generated from the SalesOrderSearchRequest type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderSearchRequest {
  public ?string $ActualDeliveryDateTimeEnd = null;

  public ?string $ActualDeliveryDateTimeStart = null;

  public ?LookupValue $Branch = null;

  public ?int $BrightreeID = null;

  public ?int $BrightreeReferralID = null;

  public ?LookupValue $Classification = null;

  public ?string $ConfirmDateTimeEnd = null;

  public ?string $ConfirmDateTimeStart = null;

  public ?string $CreateDateTimeEnd = null;

  public ?string $CreateDateTimeStart = null;

  public ?LookupValue $CreatedBy = null;

  /** @var CustomFieldSearchParam[] */
  public array $CustomFieldSearchParams = [];

  public ?LookupValue $DeliveryTechnician = null;

  public ?LookupValue $DropShipStatus = null;

  public ?bool $ExcludeConfirmedSalesOrder = null;

  public ?bool $ExcludeDropShipSalesOrder = null;

  public ?string $ExternalID = null;

  public ?LookupValue $Facility = null;

  public ?string $FulfillmentAccountNumber = null;

  public ?string $FulfillmentDateTimeEnd = null;

  public ?string $FulfillmentDateTimeStart = null;

  public ?LookupValue $FulfillmentShipByVendor = null;

  public ?string $FulfillmentStatus = null;

  public ?LookupValue $FulfillmentVendor = null;

  public ?string $LastUpdateDateEnd = null;

  public ?string $LastUpdateDateStart = null;

  public ?string $PONumber = null;

  public ?LookupValue $Patient = null;

  public ?string $PrintDateTimeEnd = null;

  public ?string $PrintDateTimeStart = null;

  public ?string $Reference = null;

  public ?LookupValue $SOShippingStatus = null;

  public ?string $ScheduledDeliveryDateTimeEnd = null;

  public ?string $ScheduledDeliveryDateTimeStart = null;

  public ?SalesOrderStatus $Status = null;

  public ?SalesOrderType $Type = null;

  public ?LookupValue $WIPAssignedTo = null;

  public ?string $WIPClosedDateEnd = null;

  public ?string $WIPClosedDateStart = null;

  public ?string $WIPCreateDateEnd = null;

  public ?string $WIPCreateDateStart = null;

  public ?int $WIPDaysInState = null;

  public ?string $WIPNeedDateEnd = null;

  public ?string $WIPNeedDateStart = null;

  public ?LookupValue $WIPUserTaskReason = null;
}
