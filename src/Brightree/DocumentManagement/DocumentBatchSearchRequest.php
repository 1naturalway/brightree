<?php

namespace Brightree\DocumentManagement;

class DocumentBatchSearchRequest {
  public ?string $BatchDescription = null;

  public ?string $BatchName = null;

  public ?int $BatchOwnerBrightreeID = null;

  public ?string $BatchOwnerFullName = null;

  public ?int $BrightreeID = null;

  public ?bool $Closed = null;

  public ?string $CreatedDate = null;

  public function setBatchDescription(?string $BatchDescription): self {
    $this->BatchDescription = $BatchDescription;
    return $this;
  }

  public function setBatchName(?string $BatchName): self {
    $this->BatchName = $BatchName;
    return $this;
  }

  public function setBatchOwnerBrightreeID(?int $BatchOwnerBrightreeID): self {
    $this->BatchOwnerBrightreeID = $BatchOwnerBrightreeID;
    return $this;
  }

  public function setBatchOwnerFullName(?string $BatchOwnerFullName): self {
    $this->BatchOwnerFullName = $BatchOwnerFullName;
    return $this;
  }

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setClosed(?bool $Closed): self {
    $this->Closed = $Closed;
    return $this;
  }

  public function setCreatedDate(?string $CreatedDate): self {
    $this->CreatedDate = $CreatedDate;
    return $this;
  }
}
