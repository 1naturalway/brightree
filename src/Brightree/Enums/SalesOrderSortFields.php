<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderSortFields type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderSortFields: string {
  case BrightreeID = 'BrightreeID';
  case ExternalID = 'ExternalID';
  case Status = 'Status';
  case CreatedDate = 'CreatedDate';
  case CreatedBy = 'CreatedBy';
  case PatientName = 'PatientName';
  case Reference = 'Reference';
}
