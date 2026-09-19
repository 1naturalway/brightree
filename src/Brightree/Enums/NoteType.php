<?php

namespace Brightree\Enums;

/**
 * Generated from the NoteType type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum NoteType: string {
  case PatientNote = 'PatientNote';
  case PractitionerNote = 'PractitionerNote';
  case FinancialNote = 'FinancialNote';
  case JustificationNote = 'JustificationNote';
  case ProgressNote = 'ProgressNote';
}
