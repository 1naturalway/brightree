<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;
use Brightree\ApiMessageServices\Facility;

class ReferenceDataService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/ReferenceDataService/ReferenceDataService.svc?singleWsdl";
  }

  public function addFacilityReferralContact(?int $FacilityBrightreeID = null, ?int $ReferralContactBrightreeID = null): mixed {
    return $this->apiCall('AddFacilityReferralContact', [
      'FacilityBrightreeID' => $FacilityBrightreeID,
      'ReferralContactBrightreeID' => $ReferralContactBrightreeID
    ]);
  }

  public function branchInfoFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('BranchInfoFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function contactTypeCreate(mixed $ContactType = null): mixed {
    return $this->apiCall('ContactTypeCreate', [
      'ContactType' => $ContactType
    ]);
  }

  public function contactTypeDelete(?int $BrightreeID = null): mixed {
    return $this->apiCall('ContactTypeDelete', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function contactTypeFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('ContactTypeFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function contactTypeUpdate(?int $BrightreeID = null, mixed $ContactType = null): mixed {
    return $this->apiCall('ContactTypeUpdate', [
      'BrightreeID' => $BrightreeID,
      'ContactType' => $ContactType
    ]);
  }

  public function facilityCreate(?Facility $Facility = null): mixed {
    return $this->apiCall('FacilityCreate', [
      'Facility' => $Facility
    ]);
  }

  public function facilityDelete(?int $BrightreeID = null): mixed {
    return $this->apiCall('FacilityDelete', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function facilityFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('FacilityFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function facilityFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('FacilityFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function facilityNoteCreate(mixed $facilityNote = null): mixed {
    return $this->apiCall('FacilityNoteCreate', [
      'facilityNote' => $facilityNote
    ]);
  }

  public function facilityNoteFetchByBrightreeID(?int $brightreeID = null): mixed {
    return $this->apiCall('FacilityNoteFetchByBrightreeID', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function facilityNoteFetchByFacility(?int $brightreeID = null): mixed {
    return $this->apiCall('FacilityNoteFetchByFacility', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function facilityNoteUpdate(?int $brightreeID = null, mixed $facilityNote = null): mixed {
    return $this->apiCall('FacilityNoteUpdate', [
      'brightreeID' => $brightreeID,
      'facilityNote' => $facilityNote
    ]);
  }

  public function facilityReferralContactsFetchByFacilityKey(?int $FacilityBrightreeID = null): mixed {
    return $this->apiCall('FacilityReferralContactsFetchByFacilityKey', [
      'FacilityBrightreeID' => $FacilityBrightreeID
    ]);
  }

  public function facilityUpdate(?int $BrightreeID = null, ?Facility $Facility = null): mixed {
    return $this->apiCall('FacilityUpdate', [
      'BrightreeID' => $BrightreeID,
      'Facility' => $Facility
    ]);
  }

  public function marketingRepFetchByBrightreeID(?string $BrightreeID = null): mixed {
    return $this->apiCall('MarketingRepFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function marketingRepFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('MarketingRepFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function marketingRepUpdateExternalID(?string $BrightreeID = null, ?string $ExternalID = null): mixed {
    return $this->apiCall('MarketingRepUpdateExternalID', [
      'BrightreeID' => $BrightreeID,
      'ExternalID' => $ExternalID
    ]);
  }

  public function referralContactCreate(mixed $Contact = null): mixed {
    return $this->apiCall('ReferralContactCreate', [
      'Contact' => $Contact
    ]);
  }

  public function referralContactFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('ReferralContactFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function referralContactFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('ReferralContactFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function referralContactSearch(mixed $SearchParams = null, ?array $SortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('ReferralContactSearch', [
      'SearchParams' => $SearchParams,
      'SortParams' => $SortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function referralContactUpdate(?int $BrightreeID = null, mixed $contact = null): mixed {
    return $this->apiCall('ReferralContactUpdate', [
      'BrightreeID' => $BrightreeID,
      'contact' => $contact
    ]);
  }

  public function referralFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('ReferralFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function referralSearch(mixed $SearchParams = null, ?array $SortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('ReferralSearch', [
      'SearchParams' => $SearchParams,
      'SortParams' => $SortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function removeFacilityReferralContact(?int $FacilityBrightreeID = null, ?int $ReferralContactBrightreeID = null): mixed {
    return $this->apiCall('RemoveFacilityReferralContact', [
      'FacilityBrightreeID' => $FacilityBrightreeID,
      'ReferralContactBrightreeID' => $ReferralContactBrightreeID
    ]);
  }

  public function vendorFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('VendorFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function accountGroupFetchAll(): mixed {
    return $this->apiCall('AccountGroupFetchAll', []);
  }

  public function branchInfoFetchAll(): mixed {
    return $this->apiCall('BranchInfoFetchAll', []);
  }

  public function claimNoteTypeFetchAll(): mixed {
    return $this->apiCall('ClaimNoteTypeFetchAll', []);
  }

  public function contactTypeFetchAll(): mixed {
    return $this->apiCall('ContactTypeFetchAll', []);
  }

  public function delivryTechnicianFetchAll(): mixed {
    return $this->apiCall('DelivryTechnicianFetchAll', []);
  }

  public function depreciationTypesFetchAll(): mixed {
    return $this->apiCall('DepreciationTypesFetchAll', []);
  }

  public function doctorNoteReasonFetchAll(): mixed {
    return $this->apiCall('DoctorNoteReasonFetchAll', []);
  }

  public function ePSDTConditionCodeFetchAll(): mixed {
    return $this->apiCall('EPSDTConditionCodeFetchAll', []);
  }

  public function facilityInfoFetchAll(): mixed {
    return $this->apiCall('FacilityInfoFetchAll', []);
  }

  public function facilityNoteReasonFetchAll(): mixed {
    return $this->apiCall('FacilityNoteReasonFetchAll', []);
  }

  public function fetchCurrentSecUser(): mixed {
    return $this->apiCall('FetchCurrentSecUser', []);
  }

  public function financialNoteReasonFetchAll(): mixed {
    return $this->apiCall('FinancialNoteReasonFetchAll', []);
  }

  public function functionalAssessmentFetchAll(): mixed {
    return $this->apiCall('FunctionalAssessmentFetchAll', []);
  }

  public function gLAccountGroupsFetchAll(): mixed {
    return $this->apiCall('GLAccountGroupsFetchAll', []);
  }

  public function itemGroupFetchAll(): mixed {
    return $this->apiCall('ItemGroupFetchAll', []);
  }

  public function itemManufacturerFetchAll(): mixed {
    return $this->apiCall('ItemManufacturerFetchAll', []);
  }

  public function itemStatusFetchAll(): mixed {
    return $this->apiCall('ItemStatusFetchAll', []);
  }

  public function itemTypesFetchAll(): mixed {
    return $this->apiCall('ItemTypesFetchAll', []);
  }

  public function justificationNoteReasonFetchAll(): mixed {
    return $this->apiCall('JustificationNoteReasonFetchAll', []);
  }

  public function locationInfoFetchAll(): mixed {
    return $this->apiCall('LocationInfoFetchAll', []);
  }

  public function mSPInsTypeFetchAll(): mixed {
    return $this->apiCall('MSPInsTypeFetchAll', []);
  }

  public function marketingRepFetchAll(): mixed {
    return $this->apiCall('MarketingRepFetchAll', []);
  }

  public function patientNoteReasonFetchAll(): mixed {
    return $this->apiCall('PatientNoteReasonFetchAll', []);
  }

  public function patientSecurityGroupFetchAll(): mixed {
    return $this->apiCall('PatientSecurityGroupFetchAll', []);
  }

  public function pickupExchangeReasonFetchAll(): mixed {
    return $this->apiCall('PickupExchangeReasonFetchAll', []);
  }

  public function placeOfServiceFetchAll(): mixed {
    return $this->apiCall('PlaceOfServiceFetchAll', []);
  }

  public function policyClaimCodeFetchAll(): mixed {
    return $this->apiCall('PolicyClaimCodeFetchAll', []);
  }

  public function policyTypeCodeFetchAll(): mixed {
    return $this->apiCall('PolicyTypeCodeFetchAll', []);
  }

  public function practitionerInfoFetchAll(): mixed {
    return $this->apiCall('PractitionerInfoFetchAll', []);
  }

  public function practitionerNoteReasonFetchAll(): mixed {
    return $this->apiCall('PractitionerNoteReasonFetchAll', []);
  }

  public function progressNoteReasonFetchAll(): mixed {
    return $this->apiCall('ProgressNoteReasonFetchAll', []);
  }

  public function salesOrderClassificationFetchAll(): mixed {
    return $this->apiCall('SalesOrderClassificationFetchAll', []);
  }

  public function salesOrderManualHoldReasonFetchAll(): mixed {
    return $this->apiCall('SalesOrderManualHoldReasonFetchAll', []);
  }

  public function salesOrderVoidReasonFetchAll(): mixed {
    return $this->apiCall('SalesOrderVoidReasonFetchAll', []);
  }

  public function salesTypesFetchAll(): mixed {
    return $this->apiCall('SalesTypesFetchAll', []);
  }

  public function secUsersFetchAll(): mixed {
    return $this->apiCall('SecUsersFetchAll', []);
  }

  public function shippingCarriersFetchAll(): mixed {
    return $this->apiCall('ShippingCarriersFetchAll', []);
  }

  public function siteInfoFetch(): mixed {
    return $this->apiCall('SiteInfoFetch', []);
  }

  public function taxZoneFetchAll(): mixed {
    return $this->apiCall('TaxZoneFetchAll', []);
  }

  public function vendorsFetchAll(): mixed {
    return $this->apiCall('VendorsFetchAll', []);
  }

  public function wIPStatesFetchAll(): mixed {
    return $this->apiCall('WIPStatesFetchAll', []);
  }
}
