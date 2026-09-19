<?php

namespace Brightree\Enums;

/**
 * Generated from the SortOrder type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SortOrder: string {
  case Ascending = 'Ascending';
  case Descending = 'Descending';
}
