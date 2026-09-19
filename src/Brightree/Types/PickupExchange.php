<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\PointOfDeliveryInfo;

/**
 * Generated from the PickupExchange type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchange {
  public ?int $BrightreeID = null;

  public ?PickupExchangeDeliveryInfo $DeliveryInfo = null;

  public ?string $ExternalID = null;

  public ?PickupExchangePatientInfo $Patientinfo = null;

  public ?PickupExchangeAuditInfo $PickupExchangeAuditInfo = null;

  public ?PickupExchangeGeneralInfo $PickupExchangeGeneralInfo = null;

  /** @var PickupExchangeItem[] */
  public array $PickupExchangeItems = [];

  public ?PickupExchangeMessages $PickupExchangeMessages = null;

  public ?PickupExchangeWIPInfo $PickupExchangeWIPInfo = null;

  public ?PointOfDeliveryInfo $PointOfDeliveryInfo = null;
}
