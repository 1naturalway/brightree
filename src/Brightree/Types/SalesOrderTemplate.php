<?php

namespace Brightree\Types;

use Brightree\SalesOrder\SalesOrderClinicalInfo;
use Brightree\SalesOrder\SalesOrderInsuranceInfo;

/**
 * Generated from the SalesOrderTemplate type in SalesOrderService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SalesOrderTemplate {
  public ?int $BrightreeID = null;

  public ?SalesOrderTemplateDeliveryInfo $DeliveryInfo = null;

  public ?string $ExternalID = null;

  public ?string $SOTemplateName = null;

  public ?SalesOrderClinicalInfo $SalesOrderClinicalInfo = null;

  public ?SalesOrderInsuranceInfo $SalesOrderInsuranceInfo = null;

  /** @var SalesOrderTemplateItemInfo[] */
  public array $SalesOrderItems = [];

  public ?SalesOrderTemplateGeneralInfo $SalesOrderTemplateGeneralInfo = null;
}
