<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;

/**
 * Extends LookupValue, matching the WSDL where SalesOrderClassification derives
 * from it and so also carries ID and Value.
 */
class SalesOrderClassification extends LookupValue {
  public ?string $Name = null;

  public function setName(?string $Name): self {
    $this->Name = $Name;
    return $this;
  }
}
