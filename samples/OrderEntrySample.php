<?php

require_once 'vendor/autoload.php';

use Brightree\BrightreeClient;

$bt = new BrightreeClient(["username" => "", "password" => '']);

$patient = new Brightree\Patient\Patient();
$patient->ExternalID = "";
$patient->PatientAuditInfo->CreatedDate = "";
$patient->PatientGeneralInfo->BillingAddress->AddressLine1 = "";
$patient->PatientGeneralInfo->BillingAddress->AddressLine2 = "";
$patient->PatientGeneralInfo->BillingAddress->City = "";
$patient->PatientGeneralInfo->BillingAddress->Country = "";
$patient->PatientGeneralInfo->BillingAddress->PostalCode = "";
$patient->PatientGeneralInfo->BillingAddress->State = "";
$patient->PatientGeneralInfo->BillingContactInfo->EmailAddress = "";
$patient->PatientGeneralInfo->BillingContactInfo->PhoneNumber = "";
$patient->PatientGeneralInfo->BirthDate = "";
$patient->PatientGeneralInfo->Branch->ID = "";
$patient->PatientGeneralInfo->CustomerType = "Patient";
$patient->PatientGeneralInfo->DeliveryAddress->AddressLine1 = "";
$patient->PatientGeneralInfo->DeliveryAddress->AddressLine2 = "";
$patient->PatientGeneralInfo->DeliveryAddress->City = "";
$patient->PatientGeneralInfo->DeliveryAddress->Country = "";
$patient->PatientGeneralInfo->DeliveryAddress->PostalCode = "";
$patient->PatientGeneralInfo->DeliveryAddress->State = "";
$patient->PatientGeneralInfo->Name->First = "";
$patient->PatientGeneralInfo->Name->Last = "";

$patient->PatientClinicalInfo->Gender = "";

$response = $bt->PatientService()->PatientCreate($patient);

if ($response->PatientCreateResult->Success === true) {
  echo "Success -> PatientCreate" . PHP_EOL;
}

$portalID = new Brightree\ApiMessageServices\CustomFieldValue();
$portalID->CustomFieldCategory = 'Patient';
$portalID->FieldStorageNumber = 1;
$portalID->ObjectDataKey = $response->PatientCreateResult->UpdatedDataKey;
$portalID->Value = "123456789";

$fields = array($portalID);
$customResponse = $bt->CustomFieldService()->CustomFieldValueSaveMultiple('Patient', $response->PatientCreateResult->UpdatedDataKey, $fields);

if ($customResponse->CustomFieldValueSaveMultipleResult->Success === true) {
  echo "Success -> CustomFieldValueSaveMultiple" . PHP_EOL;
}

echo json_encode($customResponse, JSON_PRETTY_PRINT);
