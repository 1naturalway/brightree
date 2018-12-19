<?php

namespace Brightree\SalesOrder;

class SalesOrderitems {
  public $SalesOrderItemInfo;

  public function __construct() {
    $this->SalesOrderItemInfo = new SalesOrderItemInfo;
  }

}
