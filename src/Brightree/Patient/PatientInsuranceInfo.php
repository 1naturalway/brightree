<?php

namespace Brightree\Patient;

use Brightree\Patient\Payors;
use Brightree\ApiMessageServices\WorkersCompensation;

class PatientInsuranceInfo {
  public string $EmploymentStatus;

  public ?int $HardshipDiscountPct = null;

  public ?string $HardshipReviewDate = null;

  public ?string $HardshipStartDate = null;

  public bool $IsHardship;

  public string $MaritalStatus;

  public Payors $Payors;

  public bool $PrintAmountOnDeliveryTicket;

  public WorkersCompensation $workersCompensation;

  public function __construct() {
    $this->Payors = new Payors();
    $this->workersCompensation = new WorkersCompensation();
  }

  public function setHardshipDiscountPct(?int $HardshipDiscountPct): self {
    $this->HardshipDiscountPct = $HardshipDiscountPct;

    return $this;
  }

  public function setHardshipReviewDate(?string $HardshipReviewDate): self {
    $this->HardshipReviewDate = $HardshipReviewDate;

    return $this;
  }

  public function setHardshipStartDate(?string $HardshipStartDate): self {
    $this->HardshipStartDate = $HardshipStartDate;

    return $this;
  }

  public function setIsHardship(bool $IsHardship): self {
    $this->IsHardship = $IsHardship;

    return $this;
  }

  public function setEmploymentStatus(string $EmploymentStatus): self {
    $this->EmploymentStatus = $EmploymentStatus;

    return $this;
  }

  public function setMaritalStatus(string $MaritalStatus): self {
    $this->MaritalStatus = $MaritalStatus;

    return $this;
  }

  public function setPrintAmountOnDeliveryTicket(bool $PrintAmountOnDeliveryTicket): self {
    $this->PrintAmountOnDeliveryTicket = $PrintAmountOnDeliveryTicket;

    return $this;
  }
}
