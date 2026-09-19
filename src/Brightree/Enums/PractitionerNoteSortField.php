<?php

namespace Brightree\Enums;

/**
 * Generated from the PractitionerNoteSortField type in patientservice.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum PractitionerNoteSortField: string {
  case PractitionerNoteKey = 'PractitionerNoteKey';
  case PatientLastName = 'PatientLastName';
  case CreateDt = 'CreateDt';
  case ActualDt = 'ActualDt';
  case NeedDt = 'NeedDt';
  case LastUpdateDt = 'LastUpdateDt';
  case Status = 'Status';
  case Reason = 'Reason';
}
