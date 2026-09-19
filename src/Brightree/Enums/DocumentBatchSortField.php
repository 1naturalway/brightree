<?php

namespace Brightree\Enums;

/**
 * Generated from the DocumentBatchSortField type in DocumentManagementService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum DocumentBatchSortField: string {
  case BrightreeID = 'BrightreeID';
  case BatchName = 'BatchName';
  case BatchDescription = 'BatchDescription';
  case Closed = 'Closed';
  case BatchOwnerBrightreeID = 'BatchOwnerBrightreeID';
  case BatchOwnerFullName = 'BatchOwnerFullName';
  case CreatedDate = 'CreatedDate';
}
