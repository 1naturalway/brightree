<?php

namespace Brightree\Enums;

/**
 * Generated from the SetupMethod type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum SetupMethod: string {
  case None = 'None';
  case InHome = 'InHome';
  case InFacility = 'InFacility';
  case InStore = 'InStore';
  case Remote = 'Remote';
  case Other = 'Other';
  case PAPClass = 'PAPClass';
}
