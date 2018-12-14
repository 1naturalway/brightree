<?php

namespace Brightree\SalesOrder;

class SalesOrderMessages {
  public $BrightreeId;
  public $DetailMessages;
  public $HeaderMessages;

  public function setBrightreeId($BrightreeId) {
    $this->BrightreeId = $BrightreeId;
    return $this;
  }

  public function setDetailMessages($DetailMessages) {
    $this->DetailMessages = $DetailMessages;
    return $this;
  }

  public function setHeaderMessages($HeaderMessages) {
    $this->HeaderMessages = $HeaderMessages;
    return $this;
  }
}
