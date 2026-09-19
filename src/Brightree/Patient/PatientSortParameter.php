<?php

namespace Brightree\Patient;

use Brightree\Enums\PatientSortFields;
use Brightree\Enums\SortOrder;

class PatientSortParameter {
  public PatientSortFields|string|null $SortField = null;

  public SortOrder|string|null $SortOrder = null;

  public function setSortField(PatientSortFields|string|null $SortField): self {
    $this->SortField = $SortField;
    return $this;
  }

  public function setSortOrder(SortOrder|string|null $SortOrder): self {
    $this->SortOrder = $SortOrder;
    return $this;
  }
}
