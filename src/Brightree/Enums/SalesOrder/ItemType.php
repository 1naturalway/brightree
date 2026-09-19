<?php

namespace Brightree\Enums\SalesOrder;

/**
 * Generated from the ItemType type in SalesOrderService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ItemType: string {
  case None = 'None';
  case NonSerialized = 'NonSerialized';
  case Serialized = 'Serialized';
  case Basic = 'Basic';
  case Package = 'Package';
  case Generic = 'Generic';
}
