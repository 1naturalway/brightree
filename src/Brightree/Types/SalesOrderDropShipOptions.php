<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\Priority;

/**
 * Generated from the SalesOrderDropShipOptions type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderDropShipOptions {
  public ?string $AccountNumber = null;

  public ?DeliveryContact $DeliveryContact = null;

  public ?string $Note = null;

  public ?string $RequestedShipDate = null;

  public ?LookupValue $ShipBy = null;

  public ?Priority $ShippingPriority = null;

  public ?bool $SignatureRequired = null;

  public ?bool $SubmitPO = null;
}
