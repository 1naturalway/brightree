<?php

namespace Brightree\Enums;

/**
 * Generated from the CustomFieldCategory type in CustomFieldService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum CustomFieldCategory: string {
  case Invoice = 'Invoice';
  case SalesOrder = 'SalesOrder';
  case SalesOrderTemplate = 'SalesOrderTemplate';
  case Patient = 'Patient';
  case SOTransferSOTemplate = 'SOTransferSOTemplate';
}
