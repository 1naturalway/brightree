<?php

namespace Brightree\Types;

/**
 * Generated from the PatientOptInStatus type in patientservice.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PatientOptInStatus {
  public ?int $BrightreeID = null;

  public ?bool $DemoModeEnabled = null;

  /** @var OptInStatus[] */
  public array $PatientOptInStatus = [];

  public ?string $PatientPhone = null;
}
