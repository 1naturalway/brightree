<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;
use Brightree\ApiMessageServices\Doctor;

class DoctorService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/DoctorService/DoctorService.svc?singleWsdl";
  }

  public function doctorCreate(?Doctor $doctor): mixed {
    return $this->apiCall('DoctorCreate', ['Doctor' => $doctor]);
  }

  public function addDoctorReferralContact(?int $DoctorBrightreeID = null, ?int $ReferralContactBrightreeID = null): mixed {
    return $this->apiCall('AddDoctorReferralContact', [
      'DoctorBrightreeID' => $DoctorBrightreeID,
      'ReferralContactBrightreeID' => $ReferralContactBrightreeID
    ]);
  }

  public function doctorFetchByBrightreeID(?string $BrightreeID = null): mixed {
    return $this->apiCall('DoctorFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function doctorFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('DoctorFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function doctorNoteCreate(mixed $doctorNote = null): mixed {
    return $this->apiCall('DoctorNoteCreate', [
      'doctorNote' => $doctorNote
    ]);
  }

  public function doctorNoteFetchByDoctor(?int $brightreeID = null): mixed {
    return $this->apiCall('DoctorNoteFetchByDoctor', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function doctorNoteFetchByKey(?int $brightreeID = null): mixed {
    return $this->apiCall('DoctorNoteFetchByKey', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function doctorNoteUpdate(?int $brightreeID = null, mixed $doctorNote = null): mixed {
    return $this->apiCall('DoctorNoteUpdate', [
      'brightreeID' => $brightreeID,
      'doctorNote' => $doctorNote
    ]);
  }

  public function doctorReferralContactsFetchByDoctorKey(?int $DoctorBrightreeID = null): mixed {
    return $this->apiCall('DoctorReferralContactsFetchByDoctorKey', [
      'DoctorBrightreeID' => $DoctorBrightreeID
    ]);
  }

  public function doctorSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('DoctorSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function doctorUpdate(?int $BrightreeID = null, ?Doctor $Doctor = null): mixed {
    return $this->apiCall('DoctorUpdate', [
      'BrightreeID' => $BrightreeID,
      'Doctor' => $Doctor
    ]);
  }

  public function removeDoctorReferralContact(?int $DoctorBrightreeID = null, ?int $ReferralContactBrightreeID = null): mixed {
    return $this->apiCall('RemoveDoctorReferralContact', [
      'DoctorBrightreeID' => $DoctorBrightreeID,
      'ReferralContactBrightreeID' => $ReferralContactBrightreeID
    ]);
  }

  public function cMNFaxScheduleFetchAll(): mixed {
    return $this->apiCall('CMNFaxScheduleFetchAll', []);
  }

  public function doctorGroupFetchAll(): mixed {
    return $this->apiCall('DoctorGroupFetchAll', []);
  }

  public function facilityFetchAll(): mixed {
    return $this->apiCall('FacilityFetchAll', []);
  }

  public function facilityGroupFetchAll(): mixed {
    return $this->apiCall('FacilityGroupFetchAll', []);
  }

  public function marketingRepFetchAll(): mixed {
    return $this->apiCall('MarketingRepFetchAll', []);
  }
}
