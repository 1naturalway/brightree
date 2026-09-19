<?php

namespace Brightree\Enums;

/**
 * Generated from the PatientSortFields type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PatientSortFields: string {
  case BrightreeID = 'BrightreeID';
  case PatientID = 'PatientID';
  case FirstName = 'FirstName';
  case LastName = 'LastName';
  case DOB = 'DOB';
  case DOD = 'DOD';
  case SSN = 'SSN';
  case AccountNumber = 'AccountNumber';
  case AccountGroupKey = 'AccountGroupKey';
  case AccountGroupName = 'AccountGroupName';
  case PtCustomerTypeKey = 'PtCustomerTypeKey';
  case AccountOnHold = 'AccountOnHold';
  case DeliveryStreet = 'DeliveryStreet';
  case DeliverySuite = 'DeliverySuite';
  case DeliveryCity = 'DeliveryCity';
  case DeliveryCounty = 'DeliveryCounty';
  case DeliveryState = 'DeliveryState';
  case DeliveryZip = 'DeliveryZip';
  case DeliveryCountry = 'DeliveryCountry';
  case DeliveryCountyKey = 'DeliveryCountyKey';
  case DeliveryCountryKey = 'DeliveryCountryKey';
  case DeliveryStateKey = 'DeliveryStateKey';
  case DeliveryEmailAddress = 'DeliveryEmailAddress';
  case DeliveryPhone = 'DeliveryPhone';
  case DeliveryFax = 'DeliveryFax';
  case DeliveryNote = 'DeliveryNote';
  case User1 = 'User1';
  case User2 = 'User2';
  case User3 = 'User3';
  case User4 = 'User4';
  case MasterFacilityKey = 'MasterFacilityKey';
  case MasterFacilityName = 'MasterFacilityName';
  case PractitionerKey = 'PractitionerKey';
  case PractitionerName = 'PractitionerName';
  case PriorSystemKey = 'PriorSystemKey';
  case BranchKey = 'BranchKey';
  case BranchName = 'BranchName';
  case LastAuditDate = 'LastAuditDate';
  case CreateDt = 'CreateDt';
  case PtGrpKey = 'PtGrpKey';
  case PtGrpName = 'PtGrpName';
  case IsDiabetic = 'IsDiabetic';
  case IsDeceased = 'IsDeceased';
}
