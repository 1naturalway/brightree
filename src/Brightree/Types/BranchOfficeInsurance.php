<?php

namespace Brightree\Types;

/**
 * Generated from the BranchOfficeInsurance type in InsuranceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class BranchOfficeInsurance {
  public ?BillingProviderOverride $BillingProviderOverride = null;

  public ?int $BranchBrightreeID = null;

  public ?string $BranchName = null;

  public ?BranchOfficeInsuranceEclaims $BranchOfficeInsuranceEclaims = null;

  public ?BranchOfficeInsuranceGeneral $BranchOfficeInsuranceGeneral = null;

  public ?AddressInfo $BranchPayorPayToProviderAddress = null;

  public ?int $BranchPayorPayToProviderKey = null;

  public ?int $BrightreeID = null;

  public ?BranchOfficeInsuranceCarrier $CarrierInfo = null;

  public ?BranchOfficeInsuranceInfo $Insurance = null;
}
