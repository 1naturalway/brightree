<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;

class SalesOrderAuditInfo {
  public $ConfirmedBy;
  public $ConfirmedDate;
  public $CreatedBy;
  public $CreatedDate;
  public $SalesOrderType;

  public function getCreatedBy(LookupValue $createdBy) {
    return $this->CreatedBy = $createdBy;
  }

  public function setConfirmedBy($ConfirmedBy) {
    $this->ConfirmedBy = $ConfirmedBy;
    return $this;
  }

  public function setConfirmedDate($ConfirmedDate) {
    $this->ConfirmedDate = $ConfirmedDate;
    return $this;
  }

  public function setCreatedDate($CreatedDate) {
    $this->CreatedDate = $CreatedDate;
    return $this;
  }

  public function setSalesOrderType($SalesOrderType) {
    $this->SalesOrderType = $SalesOrderType;
    return $this;
  }
}

