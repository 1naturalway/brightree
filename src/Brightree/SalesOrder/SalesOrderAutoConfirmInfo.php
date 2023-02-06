<?php

namespace Brightree\SalesOrder;

class SalesOrderAutoConfirmInfo {
  public $AutoConfirm;

  public $AutoConfirmInitialDate;

  public function setAutoConfirm($AutoConfirm) {
    $this->AutoConfirm = $AutoConfirm;
    return $this;
  }

  public function setAutoConfirmInitialDate($AutoConfirmInitialDate) {
    $this->AutoConfirmInitialDate = $AutoConfirmInitialDate;
    return $this;
  }
}
