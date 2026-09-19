<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\SpanDateOverridePriceType;
use Brightree\Enums\SpanDateType;
use Brightree\Enums\SubmissionMedia;

/**
 * Generated from the InsuranceSpanDateOverride type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceSpanDateOverride {
  public ?int $BrightreeID = null;

  public ?int $InsuranceBrightreeID = null;

  public ?SpanDateOverridePriceType $PriceType = null;

  public ?LookupValue $ProcCode = null;

  public ?SpanDateType $SpanDateType = null;

  public ?SubmissionMedia $SubmissionMedia = null;
}
