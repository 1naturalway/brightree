<?php

namespace Brightree\Types;

use Brightree\Enums\SpanDateHoldType;
use Brightree\Enums\SpanDateSplitBillingMode;
use Brightree\Enums\SpanDateType;

/**
 * Generated from the InsuranceSpanDates type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceSpanDates {
  public ?bool $AllItemGroups = null;

  public ?SpanDateSplitBillingMode $BillingOption = null;

  public ?SpanDateType $ClaimsFormPurchaseToDate = null;

  public ?SpanDateType $ClaimsFormRentalToDate = null;

  public ?SpanDateType $EClaimsPurchaseToDate = null;

  public ?SpanDateType $EClaimsRentalToDate = null;

  public ?bool $EnableSpanDateSplit = null;

  /** @var InsuranceSpanDateItemGroup[] */
  public array $ItemGroups = [];

  /** @var InsuranceSpanDateHoldInclusion[] */
  public array $SpanDateHoldInclusions = [];

  public ?SpanDateHoldType $SpanDateHoldType = null;

  /** @var InsuranceSpanDateOverride[] */
  public array $SpanDateOverrideInformation = [];

  public ?string $YearEnd = null;
}
