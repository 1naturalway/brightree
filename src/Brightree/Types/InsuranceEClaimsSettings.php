<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\eClaimsTransmissionType;

/**
 * Generated from the InsuranceEClaimsSettings type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsuranceEClaimsSettings {
  public ?bool $AlwaysIncludeServiceFacilityLoop = null;

  public ?LookupValue $CarrierType = null;

  public ?LookupValue $ClaimFilingCode = null;

  public ?bool $ClaimNumberSendBranchInsteadOfSalesOrder = null;

  public ?LookupValue $CommercialPayer = null;

  public ?bool $DoNotSendCOBInformationForBypassClaims = null;

  public ?bool $DoNotSubmitClaimsOnDOS = null;

  public ?bool $IncludePrimaryCCNOnSecondaryClaims = null;

  public ?bool $IncludeProviderSecondaryIdentifierREF01 = null;

  public ?bool $IncludeReferringProviderLoop = null;

  public ?bool $IncludeRenderingProviderLoop = null;

  public ?bool $IncludeSalesTax = null;

  public ?bool $IncludeTaxonomyInBillingAndRenderingProviderLoops = null;

  public ?LookupValue $InsuranceTypeCode = null;

  public ?int $OrderingDoctorID = null;

  public ?int $PayToProviderAddress = null;

  public ?string $PayorID = null;

  public ?string $ProcCode = null;

  public ?int $PropertyAndCasualtyPatientIdentifier = null;

  public ?int $ProviderAddress = null;

  public ?int $ProviderID = null;

  public ?int $ReferringProviderID = null;

  public ?int $RenderingProviderID = null;

  public ?string $SecondaryReceiverID = null;

  public ?LookupValue $SecondaryTypeCode = null;

  public ?bool $TransimtAllowInsteadOfCharge = null;

  public ?eClaimsTransmissionType $TransmissionType = null;

  public ?bool $TransmitCLIA = null;

  public ?bool $TransmitClosedPrimaryInvoices = null;

  public ?bool $TransmitItemNDC = null;

  public ?bool $TransmitItemProductServiceID = null;

  public ?bool $TransmitNonPrimaryClaims = null;

  public ?bool $TransmitPARAtLineLevelInsteadOfClaimLevel = null;

  public ?bool $TransmitSalesTaxAsSeparateLineItem = null;

  public ?bool $TransmitTPLSegmentOnNonPrimaryInvoices = null;

  public ?bool $TransmitZeroChargeItemsOnPrimaryInvoices = null;

  public ?bool $UnassignedTransmitPatientPayment = null;

  public ?bool $UseOrderingProviderAsReferringProviderWhenReferringProviderIsNotSelectedOnInvoice = null;

  public ?LookupValue $ValidationRuleSet = null;
}
