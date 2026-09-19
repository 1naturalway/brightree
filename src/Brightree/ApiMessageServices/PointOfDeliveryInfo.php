<?php

namespace Brightree\ApiMessageServices;

class PointOfDeliveryInfo {
  public ?string $LastMessage = null;

  public ?string $LastMessageDateTime = null;

  public ?string $Status = null;

  public ?string $StatusDateTime = null;

  public function setLastMessage(?string $LastMessage): self {
    $this->LastMessage = $LastMessage;
    return $this;
  }

  public function setLastMessageDateTime(?string $LastMessageDateTime): self {
    $this->LastMessageDateTime = $LastMessageDateTime;
    return $this;
  }

  public function setStatus(?string $Status): self {
    $this->Status = $Status;
    return $this;
  }

  public function setStatusDateTime(?string $StatusDateTime): self {
    $this->StatusDateTime = $StatusDateTime;
    return $this;
  }
}
