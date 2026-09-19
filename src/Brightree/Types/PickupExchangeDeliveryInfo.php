<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the PickupExchangeDeliveryInfo type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangeDeliveryInfo extends DeliveryInfo {
  public ?string $ActualDeliveryDateTime = null;

  public ?LookupValue $DeliveryTechnician = null;

  public ?string $ScheduledDeliveryDateTime = null;
}
