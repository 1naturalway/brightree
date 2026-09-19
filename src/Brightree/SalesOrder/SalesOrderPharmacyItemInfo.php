<?php

namespace Brightree\SalesOrder;

class SalesOrderPharmacyItemInfo {
  public ?int $BrightreeDetailID = null;

  public ?int $ContainersPerDelivery = null;

  public ?string $ExternalID = null;

  public ?bool $IsManualRx = null;

  public ?bool $IsRx = null;

  public ?float $PharmDeliveryQty = null;

  public ?bool $PrintDatesOfService = null;

  public ?string $RxDescription = null;

  public ?int $RxNumber = null;

  public ?bool $SuppressOnDeliveryTicket = null;
}
