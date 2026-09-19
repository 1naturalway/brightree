<?php

namespace Brightree\Types;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Generated from the InsurancePrintedFormsClaim type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class InsurancePrintedFormsClaim {
  public ?LookupValue $Box11ac = null;

  public ?LookupValue $Box17Type = null;

  public ?LookupValue $Box17a = null;

  public ?string $Box17aQualifier = null;

  public ?LookupValue $Box24aFormat = null;

  public ?string $Box24agQualifier = null;

  public ?LookupValue $Box24agShaded = null;

  public ?string $Box24c = null;

  public ?LookupValue $Box24e = null;

  public ?LookupValue $Box26 = null;

  public ?LookupValue $Box30 = null;

  public ?LookupValue $Box31 = null;

  public ?LookupValue $Box3233Name = null;

  public ?LookupValue $Box32Pos11 = null;

  public ?LookupValue $Box32Pos12 = null;

  public ?LookupValue $Box33Address = null;

  public ?LookupValue $Box33bQualifier = null;

  public ?int $Box33bSpaces = null;

  public ?LookupValue $Box33bValue = null;

  /** @var InsuranceCarrierCode[] */
  public array $CarrierCodes = [];

  public ?LookupValue $ClaimForm = null;

  public ?LookupValue $Envelope = null;

  public ?bool $PopulateBox11d = null;

  public ?bool $PopulateBox29 = null;

  public ?bool $PopulateNDCIn24agShaded = null;

  public ?bool $PrintAllowedAsChargeAmount = null;

  public ?bool $PrintBalanceDueInBox30 = null;

  public ?bool $PrintCLIA = null;

  public ?bool $ShowChargePaymentDetails = null;

  public ?bool $ShowPaymentRemittanceFields = null;

  public ?bool $ShowSalesOrderItemNotes = null;

  public ?bool $ShowZeroChargeItems = null;

  public ?bool $SuppressHeaderInformation = null;

  public ?LookupValue $Totals = null;

  public ?bool $WorkersCompensationClaims = null;
}
