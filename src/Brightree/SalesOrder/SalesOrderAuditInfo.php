<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\LookupValue;

class SalesOrderAuditInfo {
  public ?LookupValue $ConfirmedBy = null;

  public ?string $ConfirmedDate = null;

  public ?LookupValue $CreatedBy = null;

  public ?string $CreatedDate = null;

  public ?string $SalesOrderType = null;

  public function getCreatedBy(LookupValue $createdBy): ?LookupValue {
    return $this->CreatedBy = $createdBy;
  }

  public function setConfirmedBy(?LookupValue $ConfirmedBy): self {
    $this->ConfirmedBy = $ConfirmedBy;
    return $this;
  }

  public function setConfirmedDate(?string $ConfirmedDate): self {
    $this->ConfirmedDate = $ConfirmedDate;
    return $this;
  }

  public function setCreatedDate(?string $CreatedDate): self {
    $this->CreatedDate = $CreatedDate;
    return $this;
  }

  public function setSalesOrderType(?string $SalesOrderType): self {
    $this->SalesOrderType = $SalesOrderType;
    return $this;
  }
}
