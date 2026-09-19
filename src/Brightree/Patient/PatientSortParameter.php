<?php

namespace Brightree\Patient;

class PatientSortParameter {
  public ?string $SortField = null;

  public ?string $SortOrder = null;

  public function setSortField(?string $SortField): self {
    $this->SortField = $SortField;
    return $this;
  }

  public function setSortOrder(?string $SortOrder): self {
    $this->SortOrder = $SortOrder;
    return $this;
  }
}
