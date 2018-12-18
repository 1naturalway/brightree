<?php

namespace Brightree\Patient;

use Brightree\ApiMessageServices\LookupValue;

class PatientPolicy {
  public $StartDate;
  public $EndDate;
  public $PayPercent;
  public $Deductible;
  public $PolicyNumber;
  public $GroupNumber;
  public $User1;
  public $User2;
  public $User3;
  public $User4;
  public $Relationship;
  public $PayorId;
  public $SecondaryTypeCode;
  public $ClaimCode;
  public $TypeCode;

  public function __construct() {
    $this->SecondaryTypeCode = new LookupValue();
  }
}
