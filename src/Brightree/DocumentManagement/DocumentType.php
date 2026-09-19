<?php

namespace Brightree\DocumentManagement;

use Brightree\ApiMessageServices\LookupValue;
use Brightree\Enums\DocumentReviewModeType;

class DocumentType {
  public ?int $BrightreeID = null;

  public ?string $Description = null;

  public LookupValue $DocumentCategory;

  public DocumentReviewModeType|string|null $DocumentReviewMode = null;

  public ?bool $Enabled = null;

  public ?string $ImageNowDocumentName = null;

  public ?string $Name = null;

  public function __construct() {
    $this->DocumentCategory = new LookupValue();
  }

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setDescription(?string $Description): self {
    $this->Description = $Description;

    return $this;
  }

  public function setDocumentCategory(LookupValue $DocumentCategory): self {
    $this->DocumentCategory = $DocumentCategory;
    return $this;
  }

  public function setDocumentReviewMode(DocumentReviewModeType|string|null $DocumentReviewMode): self {
    $this->DocumentReviewMode = $DocumentReviewMode;
    return $this;
  }

  public function setEnabled(?bool $Enabled): self {
    $this->Enabled = $Enabled;
    return $this;
  }

  public function setImageNowDocumentName(?string $ImageNowDocumentName): self {
    $this->ImageNowDocumentName = $ImageNowDocumentName;
    return $this;
  }

  public function setName(?string $Name): self {
    $this->Name = $Name;
    return $this;
  }
}
