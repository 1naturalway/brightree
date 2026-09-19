<?php

namespace Brightree\SalesOrder;

class SalesOrderItems {
  public SalesOrderItemInfo $SalesOrderItemInfo;

  public function __construct() {
    $this->SalesOrderItemInfo = new SalesOrderItemInfo();
  }
}
