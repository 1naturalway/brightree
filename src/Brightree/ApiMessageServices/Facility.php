<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;

class Facility {
  public Address $Address;

  public int $BrightreeID;

  public ContactInfo $ContactInfo;

  public string $ExternalID;

  public string $FacilityGroupDescription;

  public int $FacilityGroupID;

  public string $FacilityGroupName;

  public string $FacilityName;

  public MarketingRep $MarketingRep;

  public string $NPI;

  public string $TaxonomyCode;
}
