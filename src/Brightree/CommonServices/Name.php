<?php

namespace Brightree\CommonServices;

class Name {
  public ?string $First = null;

  public ?string $Last = null;

  public ?string $Middle = null;

  public ?string $Suffix = null;

  public ?string $Title = null;

  public function setFirst(?string $First): self {
    $this->First = $First;
    return $this;
  }

  public function setLast(?string $Last): self {
    $this->Last = $Last;
    return $this;
  }

  public function setMiddle(?string $Middle): self {
    $this->Middle = $Middle;
    return $this;
  }

  public function setSuffix(?string $Suffix): self {
    $this->Suffix = $Suffix;
    return $this;
  }

  public function setTitle(?string $Title): self {
    $this->Title = $Title;
    return $this;
  }
}
