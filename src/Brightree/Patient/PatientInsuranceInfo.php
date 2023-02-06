<?php

namespace Brightree\Patient;

use Brightree\Patient\Payors;
use Brightree\ApiMessageServices\WorkersCompensation;

class PatientInsuranceInfo {
  public string $EmploymentStatus;

  public $HardshipDiscountPct;

  public $HardshipReviewDate;

  public $HardshipStartDate;

  public bool $IsHardship;

  public string $MaritalStatus;

  public $Payors;

  public bool $PrintAmountOnDeliveryTicket;

  public WorkersCompensation $workersCompensation;

  public function __construct() {
    $this->Payors = new Payors();
    $this->workersCompensation = new WorkersCompensation();
  }

  public function setHardshipDiscountPct($HardshipDiscountPct): self {
    $this->HardshipDiscountPct = $HardshipDiscountPct;

    return $this;
  }

  public function setHardshipReviewDate($HardshipReviewDate): self {
    $this->HardshipReviewDate = $HardshipReviewDate;

    return $this;
  }

  public function setHardshipStartDate($HardshipStartDate): self {
    $this->HardshipStartDate = $HardshipStartDate;

    return $this;
  }

  public function setIsHardship($IsHardship): self {
    $this->IsHardship = $IsHardship;

    return $this;
  }

  public function setEmploymentStatus($EmploymentStatus): self {
    $this->EmploymentStatus = $EmploymentStatus;

    return $this;
  }

  public function setMaritalStatus($MaritalStatus): self {
    $this->MaritalStatus = $MaritalStatus;

    return $this;
  }

  public function setPrintAmountOnDeliveryTicket($PrintAmountOnDeliveryTicket): self {
    $this->PrintAmountOnDeliveryTicket = $PrintAmountOnDeliveryTicket;

    return $this;
  }
}
