<?php

namespace Brightree\CommonServices;

use Brightree\SalesOrder\SalesOrderPayorInfo;

class Payors {
  public $SalesOrderPayorInfo;

  public function __construct() {
    $this->SalesOrderPayorInfo = new SalesOrderPayorInfo();
  }
}
