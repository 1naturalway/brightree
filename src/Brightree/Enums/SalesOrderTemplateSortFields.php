<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderTemplateSortFields type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderTemplateSortFields: string {
  case SOTemplateKey = 'SOTemplateKey';
  case Reference = 'Reference';
  case CreatedByKey = 'CreatedByKey';
  case CreatedByFullName = 'CreatedByFullName';
  case CreateDT = 'CreateDT';
  case BranchKey = 'BranchKey';
  case BranchName = 'BranchName';
  case PtKey = 'PtKey';
  case PatientFullName = 'PatientFullName';
  case LastRunDate = 'LastRunDate';
  case NextRunDate = 'NextRunDate';
  case IsScheduleDisabled = 'IsScheduleDisabled';
  case LastRunHasError = 'LastRunHasError';
  case LastRunErrorMessage = 'LastRunErrorMessage';
  case PeriodsRan = 'PeriodsRan';
  case EndPeriod = 'EndPeriod';
  case ExcludeEligibilityCheck = 'ExcludeEligibilityCheck';
  case SOTemplateStatusKey = 'SOTemplateStatusKey';
  case SOTemplateTypeKey = 'SOTemplateTypeKey';
  case SOTemplateTypeName = 'SOTemplateTypeName';
  case SOTemplateStatusName = 'SOTemplateStatusName';
  case SOTemplateStopTypeKey = 'SOTemplateStopTypeKey';
  case SOTemplateStopType = 'SOTemplateStopType';
  case LastAuditDate = 'LastAuditDate';
}
