<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\PickupExchange\ItemType;

/**
 * Generated from the PickupExchangeItem type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangeItem {
  public ?bool $BasicItemSerialNumberCollection = null;

  public ?int $BrightreeDetailID = null;

  public ?int $BrightreeID = null;

  public ?LookupValue $DefaultManufacturer = null;

  public ?string $ItemID = null;

  public ?string $ItemName = null;

  public ?ItemType $ItemType = null;

  public ?bool $Kit = null;

  public ?bool $Lotted = null;

  public ?string $ManfBarCode = null;

  public ?string $ManfItemId = null;

  public ?string $Note = null;

  /** @var PickupItem[] */
  public array $PickupItems = [];

  public ?int $Quantity = null;

  public ?int $SalesOrderBrightreeDetailID = null;

  public ?int $SalesOrderBrightreeID = null;

  public ?LookupValue $StockingUOM = null;
}
