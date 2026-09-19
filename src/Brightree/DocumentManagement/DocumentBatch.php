<?php

namespace Brightree\DocumentManagement;

use Brightree\ApiMessageServices\LookupValue;

class DocumentBatch {
  public ?string $BatchDescription = null;

  public ?string $BatchName = null;

  /**
   * Typed as SecUser in the WSDL, which extends LookupValue and adds nothing,
   * so LookupValue serialises identically. Brightree\Types\SecUser is the
   * generated stand-in if you prefer the schema's name.
   */
  public LookupValue $BatchOwner;

  public ?int $BatchTypeKey = null;

  public ?int $BrightreeID = null;

  public ?bool $Closed = null;

  public function __construct() {
    $this->BatchOwner = new LookupValue();
  }

  public function setBatchDescription(?string $BatchDescription): self {
    $this->BatchDescription = $BatchDescription;
    return $this;
  }

  public function setBatchName(?string $BatchName): self {
    $this->BatchName = $BatchName;
    return $this;
  }

  public function setBatchOwner(LookupValue $BatchOwner): self {
    $this->BatchOwner = $BatchOwner;
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

  public function setBatchTypeKey(?int $BatchTypeKey): self {
    $this->BatchTypeKey = $BatchTypeKey;
    return $this;
  }
}
