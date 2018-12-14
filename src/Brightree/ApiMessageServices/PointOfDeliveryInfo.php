<?php

namespace Brightree\ApiMessageServices;

class PointOfDeliveryInfo {
  public $LastMessage;
  public $LastMessageDateTime;
  public $Status;
  public $StatusDateTime;


  public function setLastMessage($LastMessage) {
    $this->LastMessage = $LastMessage;
    return $this;
  }

  public function setLastMessageDateTime($LastMessageDateTime) {
    $this->LastMessageDateTime = $LastMessageDateTime;
    return $this;
  }

  public function setStatus($Status) {
    $this->Status = $Status;
    return $this;
  }

  public function setStatusDateTime($StatusDateTime) {
    $this->StatusDateTime = $StatusDateTime;
    return $this;
  }
}

