<?php

namespace Brightree\Enums;

/**
 * Generated from the ClaimFormType type in InvoiceService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ClaimFormType: string {
  case None = 'None';
  case HCFA1500 = 'HCFA1500';
  case HCFA1500PlainPaper = 'HCFA1500PlainPaper';
  case InvoiceForms = 'InvoiceForms';
  case GroupBill = 'GroupBill';
  case HCFA1500New = 'HCFA1500New';
  case FacilityBill = 'FacilityBill';
  case Statements = 'Statements';
}
