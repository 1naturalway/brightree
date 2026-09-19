<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\SetupMethod;

/**
 * Generated from the SalesOrderTemplateDeliveryInfo type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplateDeliveryInfo extends DeliveryInfo {
  public ?int $ActualDateInterval = null;

  public ?bool $ActualDateSpecified = null;

  public ?LookupValue $Facility = null;

  public ?string $OrderNote = null;

  public ?int $ScheduledDateInterval = null;

  public ?bool $ScheduledDateSpecified = null;

  public ?SetupMethod $SetupMethod = null;

  public ?bool $SignatureRequired = null;

  public ?LookupValue $TaxZone = null;

  public ?bool $UsePatientAddress = null;
}
