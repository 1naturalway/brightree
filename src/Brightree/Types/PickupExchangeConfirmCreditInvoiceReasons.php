<?php

namespace Brightree\Types;

/**
 * Generated from the PickupExchangeConfirmCreditInvoiceReasons type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangeConfirmCreditInvoiceReasons {
  public ?PaymentSubType $AdjustmentReason = null;

  public ?bool $CreditSalesInvoice = null;

  public ?PaymentSubType $RefundReason = null;

  public ?PaymentSubType $TaxReason = null;
}
