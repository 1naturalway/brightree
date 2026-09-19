<?php

namespace Brightree\ApiMessageServices;

class RenderingProvider {
  public ?LookupValue $Doctor = null;

  public ?LookupValue $Facility = null;

  public ?string $Type = null;

  public function setDoctor(?LookupValue $Doctor): self {
    $this->Doctor = $Doctor;
    return $this;
  }

  public function setFacility(?LookupValue $Facility): self {
    $this->Facility = $Facility;
    return $this;
  }

  public function setType(?string $Type): self {
    $this->Type = $Type;
    return $this;
  }
}
