<?php

namespace Brightree\Types;

use Brightree\Enums\Invoice\PriceType;

/**
 * Generated from the InvoiceDetail type in InvoiceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InvoiceDetail {
  public ?InvoiceDetailAmounts $Amounts = null;

  public ?string $AttachmentNumber = null;

  public ?InvoiceDetailBillingInfo $BillingInfo = null;

  public ?bool $IncludeEClaimsAttachment = null;

  public ?int $InvoiceDetailBrightreeID = null;

  public ?string $ItemID = null;

  public ?string $ItemName = null;

  public ?string $Modifier1 = null;

  public ?string $Modifier2 = null;

  public ?string $Modifier3 = null;

  public ?string $Modifier4 = null;

  public ?PriceType $PriceType = null;

  public ?string $ProcCode = null;

  public ?int $Quantity = null;

  public ?int $SalesOrderDetailID = null;

  public ?float $TPLAmount = null;

  public ?string $TPLDate = null;

  public ?string $TPLStatus = null;
}
