<?php

namespace Brightree\Types;

use Brightree\CommonServices\Address;

/**
 * Generated from the OrderingDoctor type in InvoiceService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class OrderingDoctor {
  public ?Address $Address = null;

  public ?OrderingDoc $Doctor = null;

  public ?string $Fax = null;

  public ?string $NPI = null;

  public ?OrderingDocInfo $Name = null;

  public ?string $Phone = null;

  public ?string $UPIN = null;
}
