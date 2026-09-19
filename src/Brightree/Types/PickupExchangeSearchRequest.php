<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the PickupExchangeSearchRequest type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangeSearchRequest {
  public ?string $ActualDateTimeEnd = null;

  public ?string $ActualDateTimeStart = null;

  public ?LookupValue $Branch = null;

  public ?int $BrightreeID = null;

  public ?string $ConfirmDateTimeEnd = null;

  public ?string $ConfirmDateTimeStart = null;

  public ?string $CreateDateTimeEnd = null;

  public ?string $CreateDateTimeStart = null;

  public ?LookupValue $CreatedBy = null;

  public ?LookupValue $DeliveryTechnician = null;

  public ?string $FinalBillDateTimeEnd = null;

  public ?string $FinalBillDateTimeStart = null;

  public ?string $LastModifiedDateEnd = null;

  public ?string $LastModifiedDateStart = null;

  public ?LookupValue $MasterFacility = null;

  public ?string $Note = null;

  public ?LookupValue $PtCustomerType = null;

  public ?string $PtFirstName = null;

  public ?int $PtKey = null;

  public ?string $PtLastName = null;

  public ?string $PtMiddleName = null;

  public ?string $PtPriorSystemKey = null;

  public ?string $SchedDateTimeEnd = null;

  public ?string $SchedDateTimeStart = null;

  public ?LookupValue $Status = null;

  public ?int $WIPAssignedToKey = null;

  public ?bool $WIPCompleted = null;

  public ?string $WIPDateNeededFrom = null;

  public ?string $WIPDateNeededTo = null;

  public ?int $WIPStateKey = null;
}
