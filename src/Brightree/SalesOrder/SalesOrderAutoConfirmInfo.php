<?php

namespace Brightree\SalesOrder;

class SalesOrderAutoConfirmInfo {
  public ?bool $AutoConfirm = null;

  public ?string $AutoConfirmInitialDate = null;

  public function setAutoConfirm(?bool $AutoConfirm): self {
    $this->AutoConfirm = $AutoConfirm;
    return $this;
  }

  public function setAutoConfirmInitialDate(?string $AutoConfirmInitialDate): self {
    $this->AutoConfirmInitialDate = $AutoConfirmInitialDate;
    return $this;
  }
}
