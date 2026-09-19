<?php

namespace Brightree\Enums;

/**
 * Generated from the ProductServiceIDQualifiers type in InventoryService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ProductServiceIDQualifiers: string {
  case None = 'None';
  case EN = 'EN';
  case HI = 'HI';
  case EO = 'EO';
  case ON = 'ON';
  case UK = 'UK';
  case UP = 'UP';
}
