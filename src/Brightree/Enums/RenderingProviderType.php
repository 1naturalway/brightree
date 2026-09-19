<?php

namespace Brightree\Enums;

/**
 * Generated from the RenderingProviderType type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum RenderingProviderType: string {
  case None = 'None';
  case BranchOffice = 'BranchOffice';
  case Doctor = 'Doctor';
  case Facility = 'Facility';
}
