<?php

namespace Brightree\ApiMessageServices;

use Brightree\CommonServices\Address;
use Brightree\CommonServices\ContactInfo;

/**
 * The Facility shape DoctorService.wsdl returns.
 *
 * ReferenceDataService.wsdl declares a different and larger type of the same
 * name — that one is Brightree\Types\ReferenceData\Facility, and it is what
 * ReferenceDataService::facilityCreate()/facilityUpdate() take. The two are
 * not interchangeable: only eight of their fields overlap.
 */
class Facility {
  public Address $Address;

  public ?int $BrightreeID = null;

  public ContactInfo $ContactInfo;

  public ?string $ExternalID = null;

  public ?string $FacilityGroupDescription = null;

  public ?int $FacilityGroupID = null;

  public ?string $FacilityGroupName = null;

  public ?string $FacilityName = null;

  public MarketingRep $MarketingRep;

  public ?string $NPI = null;

  public ?string $TaxonomyCode = null;

  public function __construct() {
    $this->Address = new Address();
    $this->ContactInfo = new ContactInfo();
    $this->MarketingRep = new MarketingRep();
  }
}
