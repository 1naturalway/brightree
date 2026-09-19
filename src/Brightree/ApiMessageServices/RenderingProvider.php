<?php

namespace Brightree\ApiMessageServices;

use Brightree\Enums\RenderingProviderType;

class RenderingProvider {
  public ?LookupValue $Doctor = null;

  public ?LookupValue $Facility = null;

  public RenderingProviderType|string|null $Type = null;

  public function setDoctor(?LookupValue $Doctor): self {
    $this->Doctor = $Doctor;
    return $this;
  }

  public function setFacility(?LookupValue $Facility): self {
    $this->Facility = $Facility;
    return $this;
  }

  public function setType(RenderingProviderType|string|null $Type): self {
    $this->Type = $Type;
    return $this;
  }
}
