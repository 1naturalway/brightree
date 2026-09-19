<?php

namespace Brightree\Types;

/**
 * Generated from the PickupItem type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupItem {
  public ?string $AssetNumber = null;

  public ?string $ExchangeItemID = null;

  /** @var ExchangeItem[] */
  public array $ExchangeItems = [];

  public ?string $LotNumber = null;

  public ?int $Quantity = null;

  public ?string $SerialNumber = null;
}
