<?php

namespace Brightree\SalesOrder;

class SalesOrderMessages {
  public ?int $BrightreeID = null;

  /** @var \Brightree\Types\SalesOrderValidationDetailMessage[]|null */
  public ?array $DetailMessages = null;

  /** @var \Brightree\Types\SalesOrderValidationHeaderMessage[]|null */
  public ?array $HeaderMessages = null;

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setDetailMessages(?array $DetailMessages): self {
    $this->DetailMessages = $DetailMessages;
    return $this;
  }

  public function setHeaderMessages(?array $HeaderMessages): self {
    $this->HeaderMessages = $HeaderMessages;
    return $this;
  }
}
