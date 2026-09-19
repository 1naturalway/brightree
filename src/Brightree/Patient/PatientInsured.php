<?php

namespace Brightree\Patient;

use Brightree\Enums\Gender;

class PatientInsured extends Contact {
  public ?string $BirthDate = null;

  public ?string $SSN = null;

  public Gender|string|null $Gender = null;

  public ?string $Employer = null;

  public ?string $EmployerContact = null;

  public ?string $EmployerAddress1 = null;

  public ?string $EmployerAddress2 = null;

  public ?string $EmployerCity = null;

  public ?string $EmployerCountry = null;

  public ?string $EmployerPostalCode = null;

  public ?string $EmployerState = null;

  public ?string $InsuredEmployerPhone = null;
}
