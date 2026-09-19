<?php

namespace Brightree\Types\ReferenceData;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;

/**
 * Generated from the Facility type in ReferenceDataService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class Facility {
  public ?Address $Address = null;

  public ?int $BrightreeID = null;

  public ?string $CommercialNumber = null;

  public ?ContactInfo $ContactInfo = null;

  public ?string $ExternalID = null;

  public ?LookupValue $FacilityGroupName = null;

  public ?string $LocationID = null;

  public ?string $MarketingRepFirstName = null;

  public ?string $MarketingRepLastName = null;

  public ?string $MarketingRepMiddleName = null;

  public ?string $NPI = null;

  public ?string $Name = null;

  public ?string $Note = null;

  public ?string $ReferralLeadStartDate = null;

  public ?string $ReferralLeadStatus = null;

  public ?string $ReferralStartDate = null;

  public ?LookupValue $SalesFunnelStatus = null;

  public ?string $TaxonomyCode = null;
}
