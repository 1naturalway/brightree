<?php

namespace Brightree\Enums;

/**
 * Generated from the SalesOrderWIPStatusUpdateSortField type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SalesOrderWIPStatusUpdateSortField: string {
  case PatientKey = 'PatientKey';
  case BranchKey = 'BranchKey';
  case WipDateNeeded = 'WipDateNeeded';
}
