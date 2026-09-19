<?php

namespace Brightree\SalesOrder;

/**
 * Wrapper for the WSDL's ArrayOfSalesOrderItemPayorInfo, whose repeating child
 * element is named SalesOrderItemPayorInfo. Distinct from Payors, which wraps
 * ArrayOfSalesOrderPayorInfo at the sales order level.
 */
class ItemPayors {
  public SalesOrderItemPayorInfo $SalesOrderItemPayorInfo;

  public function __construct() {
    $this->SalesOrderItemPayorInfo = new SalesOrderItemPayorInfo();
  }

  public function setSalesOrderItemPayorInfo(SalesOrderItemPayorInfo $SalesOrderItemPayorInfo): self {
    $this->SalesOrderItemPayorInfo = $SalesOrderItemPayorInfo;
    return $this;
  }
}
