<?php

namespace Brightree\Types;

use Brightree\Enums\BillingPeriod;
use Brightree\Enums\SpanDatePeriod;

/**
 * Generated from the PriceDetail type in PricingService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PriceDetail {
  public ?bool $AcceptAssignment = null;

  public ?float $AllowAmt = null;

  public ?bool $BillArrears = null;

  public ?int $BillCycleFreq = null;

  public ?BillingPeriod $BillCycleTypeKey = null;

  public ?bool $BillPriceTableProcCodeForDenial = null;

  public ?float $BillQtyMultiplier = null;

  public ?int $BrightreeDetailID = null;

  public ?int $BrightreeID = null;

  public ?int $CMNFormKey = null;

  public ?bool $CMNReqToBill = null;

  public ?bool $CapLetterPd = null;

  public ?float $ChargeAmt = null;

  public ?bool $ConvPurch = null;

  public ?string $DBCrDt = null;

  public ?BillingPeriod $DailyBillCycleTypeKey = null;

  public ?int $DailyInterval = null;

  public ?string $EffectiveEndDt = null;

  public ?string $EffectiveStartDt = null;

  public ?int $EndPd = null;

  public ?bool $EnforceMaxDays = null;

  public ?bool $EnforceMinDays = null;

  public ?bool $FunctionalAbilityReq = null;

  public ?int $MaxDays = null;

  public ?int $Mindays = null;

  public ?string $Modifier1 = null;

  public ?string $Modifier2 = null;

  public ?string $Modifier3 = null;

  public ?string $Modifier4 = null;

  public ?bool $MultiplyQtyByDays = null;

  public ?int $NonTaxReasonKey = null;

  public ?bool $OptionDefault = null;

  public ?string $OptionName = null;

  public ?int $OptionNumber = null;

  public ?int $PARFormKey = null;

  public ?string $PARRequiredInitialServiceDt = null;

  public ?bool $PAReq = null;

  public ?int $PriceOptionLetterTypeKey = null;

  public ?bool $PrintInvoiceOnly = null;

  public ?bool $ProRate = null;

  public ?float $PurchAllowAmt = null;

  public ?float $PurchChargeAmt = null;

  public ?string $PurchModifier1 = null;

  public ?string $PurchModifier2 = null;

  public ?string $PurchModifier3 = null;

  public ?string $PurchModifier4 = null;

  public ?bool $SpanDate = null;

  public ?int $SpanDateInterval = null;

  public ?SpanDatePeriod $SpanDateType = null;

  public ?int $StartPd = null;

  public ?bool $SynchToCalendar = null;

  public ?int $SynchtoCalendarDay = null;

  public ?bool $Taxable = null;

  public ?bool $UseBillingWhenSecondary = null;
}
