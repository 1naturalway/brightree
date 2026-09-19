<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\Inventory\Severity;
use Brightree\Enums\RequestStatus;
use Brightree\Enums\State;
use Brightree\Enums\Status;
use Brightree\SalesOrder\ShippingTrackingInfo;

/**
 * Generated from the ItemMaintenance type in InventoryService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ItemMaintenance {
  public ?string $ActualDate = null;

  public ?string $AssetNumber = null;

  public ?LookupValue $AssignedTo = null;

  public ?int $BrightreeID = null;

  public ?LookupValue $CreatedBy = null;

  public ?string $CreatedDate = null;

  public ?string $DateClosed = null;

  public ?bool $DeactivateNote = null;

  public ?string $Description = null;

  public ?string $ItemBrightreeID = null;

  public ?string $ItemID = null;

  public ?LookupValue $ItemMaintenancePartner = null;

  public ?string $ItemUser1 = null;

  public ?string $ItemUser2 = null;

  public ?string $ItemUser3 = null;

  public ?string $ItemUser4 = null;

  public ?float $LaborCost = null;

  public ?LookupValue $Location = null;

  public ?string $LockDate = null;

  public ?LookupValue $LockedBy = null;

  public ?LookupValue $Manufacturer = null;

  public ?string $ManufacturerBarCode = null;

  public ?string $ManufacturerID = null;

  public ?float $MaterialCost = null;

  public ?int $MeterHours = null;

  public ?string $NeededDate = null;

  /** @var ItemMaintenanceNote[] */
  public array $Notes = [];

  public ?string $RMAID = null;

  public ?LookupValue $Reason = null;

  public ?RequestStatus $RequestStatus = null;

  public ?string $SerialNumber = null;

  public ?Severity $Severity = null;

  /** @var ShippingTrackingInfo[] */
  public array $ShippingTrackingInfo = [];

  public ?State $State = null;

  public ?Status $Status = null;

  public ?string $Subject = null;

  public ?LookupValue $SubmittedBy = null;

  public ?string $SubmittedDate = null;

  public ?float $TotalCost = null;
}
