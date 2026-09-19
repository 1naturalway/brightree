<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderVoidSortFields type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderVoidSortFields: string {
  case BrightreeID = 'BrightreeID';
  case ExternalID = 'ExternalID';
  case VoidedDate = 'VoidedDate';
  case VoidedBy = 'VoidedBy';
  case VoidReason = 'VoidReason';
  case PatientName = 'PatientName';
  case Reference = 'Reference';
}
