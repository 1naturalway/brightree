<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;

class PatientPolicy {
  public ?string $StartDate = null;

  public ?string $EndDate = null;

  public ?float $PayPercent = null;

  public ?string $Deductible = null;

  public ?string $PolicyNumber = null;

  public ?string $GroupNumber = null;

  public ?string $User1 = null;

  public ?string $User2 = null;

  public ?string $User3 = null;

  public ?string $User4 = null;

  public ?string $Relationship = null;

  public ?string $PayorId = null;

  public LookupValue $SecondaryTypeCode;

  public ?string $ClaimCode = null;

  public ?string $TypeCode = null;

  public ?string $AdditionalPatientID = null;

  public ?string $CarrierID = null;

  public ?string $EligibilityClarificationCode = null;

  public ?string $EmployerID = null;

  public ?string $GroupName = null;

  public ?string $HomePlan = null;

  public ?bool $IsPayPercentZero = null;

  public ?string $NCPDPGroupNumber = null;

  public ?string $NCPDPPolicyNumber = null;

  public ?string $PCN = null;

  public ?int $PersonCode = null;

  public ?string $PlanNumber = null;

  public ?string $PropertyandCasualtyAgencyClaimNumber = null;

  public ?string $TPLCode = null;

  public ?string $TPLName = null;

  public function __construct() {
    $this->SecondaryTypeCode = new LookupValue();
  }
}
