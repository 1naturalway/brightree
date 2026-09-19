<?php

namespace Brightree\Enums;

/**
 * Generated from the PuExSearchSortField type in PickupExchangeService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PuExSearchSortField: string {
  case PuExKey = 'PuExKey';
  case PtKey = 'PtKey';
  case PtPriorSystemKey = 'PtPriorSystemKey';
  case PtFirstName = 'PtFirstName';
  case PtMiddleName = 'PtMiddleName';
  case PtLastName = 'PtLastName';
  case PuExStatKey = 'PuExStatKey';
  case PuExStatusName = 'PuExStatusName';
  case CreateDt = 'CreateDt';
  case CreatedByKey = 'CreatedByKey';
  case CreatedByFullName = 'CreatedByFullName';
  case Note = 'Note';
  case BranchKey = 'BranchKey';
  case BranchName = 'BranchName';
  case SchedDt = 'SchedDt';
  case ActualDt = 'ActualDt';
  case FinalBillDt = 'FinalBillDt';
  case ConfirmDt = 'ConfirmDt';
  case PtCustomerTypeKey = 'PtCustomerTypeKey';
  case CustomerTypeName = 'CustomerTypeName';
  case MasterFacilityKey = 'MasterFacilityKey';
  case MasterFacilityName = 'MasterFacilityName';
  case DeliveryTechnicianKey = 'DeliveryTechnicianKey';
  case DeliveryTechnicianFullName = 'DeliveryTechnicianFullName';
}
