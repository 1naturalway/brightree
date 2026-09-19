<?php

namespace Brightree\Patient;

class PatientDiabeticCondition {
  public ?bool $IsDiabetic = null;

  public ?bool $IsInsulinDependent = null;

  public ?string $LastDoctorVisitDate = null;

  public ?string $PatientTestingFrequency = null;

  public ?int $PatientTestingInterval = null;

  public ?string $PhysicianOrderedTestingFrequency = null;

  public ?int $PhysicianOrderedTestingInterval = null;
}
