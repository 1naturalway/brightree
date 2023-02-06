<?php

namespace Brightree\SalesOrder;

class Payors {
  public $SalesOrderPayorInfo;

  public function __construct() {
    $this->SalesOrderPayorInfo = new SalesOrderPayorInfo();
  }
}
