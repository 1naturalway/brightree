<?php

namespace Brightree\Types;

use Brightree\Enums\BillingOption;

/**
 * Generated from the SpanDateSplit type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class SpanDateSplit {
  public ?bool $AllItemGroups = null;

  public ?BillingOption $BillingOption = null;

  public ?bool $EnableSpanDateSplit = null;

  /** @var int[] */
  public array $ItemGroupBrightreeIDs = [];

  public ?string $YearEnd = null;

  public ?int $insuranceBrightreeID = null;
}
