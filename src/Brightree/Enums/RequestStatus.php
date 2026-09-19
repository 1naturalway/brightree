<?php

namespace Brightree\Enums;

/**
 * Generated from the RequestStatus type in InventoryService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum RequestStatus: string {
  case Submitted = 'Submitted';
  case CreatingEstimate = 'CreatingEstimate';
  case WaitingForApproval = 'WaitingForApproval';
  case ServiceInProgress = 'ServiceInProgress';
  case PendingShipment = 'PendingShipment';
  case Shipped = 'Shipped';
  case Delivered = 'Delivered';
}
