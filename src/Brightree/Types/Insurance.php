<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\CommonServices\Address;
use Brightree\Enums\NutritionCalculatorMethod;
use Brightree\Enums\SubmissionMethod;
use Brightree\Enums\UpdateSOActualDtBasedOn810;

/**
 * Generated from the Insurance type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class Insurance {
  public ?Address $AddressInfo = null;

  public ?bool $AllowAutomaticConfirmationOfPickupExchangeOrders = null;

  public ?bool $AllowAutomaticConfirmationOfSalesOrders = null;

  public ?bool $AllowBulkConfirmDropShipOrders = null;

  public ?bool $ApplyA1Thru9ModifierOnSOCreate = null;

  public ?InsuranceAutoCrossover $AutoCrossOverInformation = null;

  public ?InsuranceAutoEligibilityChecks $AutomaticEligibilityChecks = null;

  public ?int $BrightreeID = null;

  public ?BundleBillingRuleSet $BundledBillingRuleSet = null;

  public ?LookupValue $ClaimForm = null;

  public ?bool $CommercialERNAlternate = null;

  public ?LookupValue $CommercialEligibiltyPayer = null;

  public ?InsuranceContactInfo $ContactInfo = null;

  public ?LookupValue $CoverageLimit = null;

  public ?InsuranceCoverageType $CoverageType = null;

  public ?bool $DefaultCoverageLimits = null;

  public ?bool $DefaultFromItemClaimNote = null;

  public ?bool $DoNotProcessReversals = null;

  public ?InsuranceEClaimsCarrier $EClaimsCarrier = null;

  public ?InsuranceEClaimsSettings $EClaimsSettings = null;

  public ?bool $ExcludeFromConnect = null;

  public ?string $ExternalID = null;

  public ?InsuranceGeneralInfo $GeneralInfo = null;

  public ?string $ICD10EffectiveDate = null;

  public ?bool $Inactive = null;

  public ?bool $Medigap = null;

  public ?string $MedigapNumber = null;

  public ?string $Note = null;

  public ?bool $OverrideSOTFrequency = null;

  public ?LookupValue $PrintType = null;

  public ?InsurancePrintedFormsAppeal $PrintedFormsAppeal = null;

  public ?InsurancePrintedFormsClaim $PrintedFormsClaim = null;

  public ?InsurancePrintedFormsPAR $PrintedFormsPAR = null;

  public ?string $ProcCode = null;

  public ?bool $RestrictAccess = null;

  public ?NutritionCalculatorMethod $SalesOrderNutritionCalculator = null;

  public ?InsuranceSpanDates $SpanDates = null;

  public ?SubmissionMethod $Submission = null;

  public ?InsuranceSupplyAllowanceRuleSet $SupplyAllowanceRuleSet = null;

  public ?UpdateSOActualDtBasedOn810 $UpdateSalesOrderActualDateBasedOn856 = null;

  public ?bool $UseCompetitiveBidAllowable = null;

  public ?InsuranceValidation $Validation = null;

  /** @var InsuranceValidationRuleSets[] */
  public array $ValidationRuleSets = [];

  public ?bool $WaitForPreviousPayorBeforeBillingPatient = null;
}
