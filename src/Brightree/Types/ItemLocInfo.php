<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\ItemLocLotNumberInfo;
use Brightree\ApiMessageServices\ItemLocSerialNumberInfo;
use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the ItemLocInfo type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemLocInfo {
  public ?LocBin $AlternateBin = null;

  public ?int $AvailableQty = null;

  public ?float $AvgCostAmt = null;

  public ?LocBin $Bin = null;

  public ?int $CommittedQty = null;

  public ?int $InitialQty = null;

  public ?ItemInfo $ItemInfo = null;

  public ?LookupValue $Location = null;

  /** @var ItemLocLotNumberInfo[] */
  public array $LotNumberInfo = [];

  public ?int $MaxQty = null;

  public ?int $MinQty = null;

  public ?float $MostRecentCost = null;

  public ?int $OnHandQty = null;

  public ?int $OnOrderQty = null;

  public ?int $OnRentQty = null;

  public ?int $ReorderQty = null;

  /** @var ItemLocSerialNumberInfo[] */
  public array $SerialNumberInfo = [];

  public ?int $TotalQty = null;
}
