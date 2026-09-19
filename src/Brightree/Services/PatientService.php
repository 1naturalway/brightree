<?php

namespace Brightree\Services;

use Brightree\Patient\Patient;
use Brightree\Patient\PatientSearchRequest;
use Brightree\Patient\PatientSortParameter;
use Brightree\Services\BaseService;
use Brightree\Patient\PatientPayor;

class PatientService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/OrderEntryService/patientservice.svc?singleWsdl";
  }

  public function patientFetchbyBrightreeID(?int $BrightreeID): mixed {
    return $this->apiCall('PatientFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
  }

  public function patientCreate(Patient $Patient): mixed {
    return $this->apiCall('PatientCreate', ['Patient' => $Patient]);
  }

  public function patientUpdate(Patient $Patient, ?int $BrightreeID): mixed {
    return $this->apiCall('PatientUpdate', [
      'Patient' => $Patient,
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function patientPayorAdd(?int $PatientKey, ?PatientPayor $PatientPayor): mixed {
    return $this->apiCall('PatientPayorAdd', [
      'PatientKey' => $PatientKey,
      'PayorKey' => $PatientPayor->PayorKey,
      'PatientPayor' => $PatientPayor
    ]);
  }

  public function patientPayorUpdate(?int $BrightreeID, ?PatientPayor $PatientPayor): mixed {
    return $this->apiCall('PatientPayorUpdate', [
      'BrightreeID' => $BrightreeID,
      'PatientPayor' => $PatientPayor
    ]);
  }

  public function patientPayorFetch(?int $PatientKey, ?int $PayorKey): mixed {
    return $this->apiCall('PatientPayorFetch', [
      'PatientKey' => $PatientKey,
      'PayorKey' => $PayorKey
    ]);
  }

  public function patientPayorFetchAll(?int $PatientKey): mixed {
    return $this->apiCall('PatientPayorFetchAll', ['PatientKey' => $PatientKey]);
  }

  public function patientPayorInfo(?int $BrightreeID): mixed {
    $patient = $this->apiCall('PatientFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
    return $patient->PatientFetchByBrightreeIDResult->Items->Patient->PatientInsuranceInfo->Payors->PatientPayorInfo;
  }

  /**
   * @param PatientSortParameter[]|null $sortRequest
   */
  public function patientSearch(
      ?PatientSearchRequest $searchRequest,
      ?array $sortRequest = null,
      ?int $pageSize = null,
      ?int $page = null
  ): mixed {
    return $this->apiCall('PatientSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function additionalPatientContactCreate(mixed $AdditionalPatientContact = null): mixed {
    return $this->apiCall('AdditionalPatientContactCreate', [
      'AdditionalPatientContact' => $AdditionalPatientContact
    ]);
  }

  public function additionalPatientContactFetchByBrightreeID(?string $PatientBrightreeID = null): mixed {
    return $this->apiCall('AdditionalPatientContactFetchByBrightreeID', [
      'PatientBrightreeID' => $PatientBrightreeID
    ]);
  }

  public function additionalPatientContactFetchByPatientID(?string $PatientID = null): mixed {
    return $this->apiCall('AdditionalPatientContactFetchByPatientID', [
      'PatientID' => $PatientID
    ]);
  }

  public function additionalPatientContactUpdate(?int $BrightreePatientContactKey = null, mixed $AdditionalPatientContact = null): mixed {
    return $this->apiCall('AdditionalPatientContactUpdate', [
      'BrightreePatientContactKey' => $BrightreePatientContactKey,
      'AdditionalPatientContact' => $AdditionalPatientContact
    ]);
  }

  public function facilityResidentCreate(?int $facilityMasterKey = null, mixed $FacilityResidentInfo = null): mixed {
    return $this->apiCall('FacilityResidentCreate', [
      'facilityMasterKey' => $facilityMasterKey,
      'FacilityResidentInfo' => $FacilityResidentInfo
    ]);
  }

  public function fetchPatientOptInStatus(?int $brightreeId = null, ?string $patientPhone = null): mixed {
    return $this->apiCall('FetchPatientOptInStatus', [
      'brightreeId' => $brightreeId,
      'patientPhone' => $patientPhone
    ]);
  }

  public function financialNoteCreate(mixed $financialNote = null): mixed {
    return $this->apiCall('FinancialNoteCreate', [
      'financialNote' => $financialNote
    ]);
  }

  public function financialNoteFetchByPatient(?int $brightreeID = null): mixed {
    return $this->apiCall('FinancialNoteFetchByPatient', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function financialNoteSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('FinancialNoteSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function financialNoteUpdate(?int $brightreeID = null, mixed $financialNote = null): mixed {
    return $this->apiCall('FinancialNoteUpdate', [
      'brightreeID' => $brightreeID,
      'financialNote' => $financialNote
    ]);
  }

  public function justificationNoteCreate(mixed $justificationNote = null): mixed {
    return $this->apiCall('JustificationNoteCreate', [
      'justificationNote' => $justificationNote
    ]);
  }

  public function justificationNoteFetchByPatient(?int $brightreeID = null): mixed {
    return $this->apiCall('JustificationNoteFetchByPatient', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function justificationNoteSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('JustificationNoteSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function justificationNoteUpdate(?int $brightreeID = null, mixed $justificationNote = null): mixed {
    return $this->apiCall('JustificationNoteUpdate', [
      'brightreeID' => $brightreeID,
      'justificationNote' => $justificationNote
    ]);
  }

  public function patientAddMarketingReferral(?int $BrightreeID = null, ?int $BrightreeReferralID = null): mixed {
    return $this->apiCall('PatientAddMarketingReferral', [
      'BrightreeID' => $BrightreeID,
      'BrightreeReferralID' => $BrightreeReferralID
    ]);
  }

  public function patientFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('PatientFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  public function patientFetchByPatientID(?string $PatientID = null): mixed {
    return $this->apiCall('PatientFetchByPatientID', [
      'PatientID' => $PatientID
    ]);
  }

  public function patientNoteCommentCreate(mixed $patientNoteCommentCreateRequest = null): mixed {
    return $this->apiCall('PatientNoteCommentCreate', [
      'patientNoteCommentCreateRequest' => $patientNoteCommentCreateRequest
    ]);
  }

  public function patientNoteCommentUpdate(mixed $patientNoteCommentCreateRequest = null): mixed {
    return $this->apiCall('PatientNoteCommentUpdate', [
      'patientNoteCommentCreateRequest' => $patientNoteCommentCreateRequest
    ]);
  }

  public function patientNoteCommentsFetch(?int $patientNotekey = null): mixed {
    return $this->apiCall('PatientNoteCommentsFetch', [
      'patientNotekey' => $patientNotekey
    ]);
  }

  public function patientNoteCreate(mixed $patientNote = null): mixed {
    return $this->apiCall('PatientNoteCreate', [
      'patientNote' => $patientNote
    ]);
  }

  public function patientNoteFetchByKey(?int $brightreeID = null): mixed {
    return $this->apiCall('PatientNoteFetchByKey', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function patientNoteFetchByPatient(?int $brightreeID = null): mixed {
    return $this->apiCall('PatientNoteFetchByPatient', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function patientNoteReasonTemplateFetch(?string $noteType = null, ?int $reasonKey = null): mixed {
    return $this->apiCall('PatientNoteReasonTemplateFetch', [
      'noteType' => $noteType,
      'reasonKey' => $reasonKey
    ]);
  }

  public function patientNoteSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('PatientNoteSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function patientNoteUpdate(?int $brightreeID = null, mixed $patientNote = null): mixed {
    return $this->apiCall('PatientNoteUpdate', [
      'brightreeID' => $brightreeID,
      'patientNote' => $patientNote
    ]);
  }

  public function patientPayorRemove(?int $BrightreeID = null): mixed {
    return $this->apiCall('PatientPayorRemove', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function patientPhoneNumberSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('PatientPhoneNumberSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function patientRemoveMarketingReferral(?int $BrightreeID = null): mixed {
    return $this->apiCall('PatientRemoveMarketingReferral', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function patientUpdateSleepTherapyPatientID(?int $BrightreeID = null, ?int $SleepTherapyPartnerID = null, ?string $SleepTherapyPatientID = null, ?string $SerialNumber = null, ?string $DeviceNumber = null): mixed {
    return $this->apiCall('PatientUpdateSleepTherapyPatientID', [
      'BrightreeID' => $BrightreeID,
      'SleepTherapyPartnerID' => $SleepTherapyPartnerID,
      'SleepTherapyPatientID' => $SleepTherapyPatientID,
      'SerialNumber' => $SerialNumber,
      'DeviceNumber' => $DeviceNumber
    ]);
  }

  public function pharmacyPatientClinicalInfoFetchByBrightreeID(?int $BrightreeID = null, ?int $ClinicalInfoFlag = null, ?bool $ActiveOnly = null): mixed {
    return $this->apiCall('PharmacyPatientClinicalInfoFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID,
      'ClinicalInfoFlag' => $ClinicalInfoFlag,
      'ActiveOnly' => $ActiveOnly
    ]);
  }

  public function pharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID(?int $BrightreeID = null, ?int $PatientBrightreeID = null): mixed {
    return $this->apiCall('PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID', [
      'BrightreeID' => $BrightreeID,
      'PatientBrightreeID' => $PatientBrightreeID
    ]);
  }

  public function pharmacyPatientMedicationHistoryFetchByBrightreeIDAndPatientBrightreeID(?int $BrightreeID = null, ?int $PatientBrightreeID = null): mixed {
    return $this->apiCall('PharmacyPatientMedicationHistoryFetchByBrightreeIDAndPatientBrightreeID', [
      'BrightreeID' => $BrightreeID,
      'PatientBrightreeID' => $PatientBrightreeID
    ]);
  }

  public function pharmacyPatientMostRecentLabResultsFetchByPatientBrightreeID(?int $PatientBrightreeID = null): mixed {
    return $this->apiCall('PharmacyPatientMostRecentLabResultsFetchByPatientBrightreeID', [
      'PatientBrightreeID' => $PatientBrightreeID
    ]);
  }

  public function practitionerNoteCreate(mixed $progressNote = null): mixed {
    return $this->apiCall('PractitionerNoteCreate', [
      'progressNote' => $progressNote
    ]);
  }

  public function practitionerNoteFetchByPatient(?int $brightreeID = null): mixed {
    return $this->apiCall('PractitionerNoteFetchByPatient', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function practitionerNoteSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('PractitionerNoteSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function practitionerNoteUpdate(?int $brightreeID = null, mixed $progressNote = null): mixed {
    return $this->apiCall('PractitionerNoteUpdate', [
      'brightreeID' => $brightreeID,
      'progressNote' => $progressNote
    ]);
  }

  public function progressNoteCreate(mixed $progressNote = null): mixed {
    return $this->apiCall('ProgressNoteCreate', [
      'progressNote' => $progressNote
    ]);
  }

  public function progressNoteFetchByPatient(?int $brightreeID = null): mixed {
    return $this->apiCall('ProgressNoteFetchByPatient', [
      'brightreeID' => $brightreeID
    ]);
  }

  public function progressNoteSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('ProgressNoteSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function progressNoteUpdate(?int $brightreeID = null, mixed $progressNote = null): mixed {
    return $this->apiCall('ProgressNoteUpdate', [
      'brightreeID' => $brightreeID,
      'progressNote' => $progressNote
    ]);
  }

  public function updatePatientOptInStatus(mixed $patientOptInStatus = null): mixed {
    return $this->apiCall('UpdatePatientOptInStatus', [
      'patientOptInStatus' => $patientOptInStatus
    ]);
  }

  public function facilityMasterInfoFetchAll(): mixed {
    return $this->apiCall('FacilityMasterInfoFetchAll', []);
  }
}
