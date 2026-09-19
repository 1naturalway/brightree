<?php

namespace Brightree\Patient;

use Brightree\Enums\TestingFrequencyEnum;

class PatientDiabeticCondition {
  public ?bool $IsDiabetic = null;

  public ?bool $IsInsulinDependent = null;

  public ?string $LastDoctorVisitDate = null;

  public TestingFrequencyEnum|string|null $PatientTestingFrequency = null;

  public ?int $PatientTestingInterval = null;

  public TestingFrequencyEnum|string|null $PhysicianOrderedTestingFrequency = null;

  public ?int $PhysicianOrderedTestingInterval = null;
}
