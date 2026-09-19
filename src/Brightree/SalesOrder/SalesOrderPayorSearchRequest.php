<?php

namespace Brightree\SalesOrder;

class SalesOrderPayorSearchRequest {
  public ?int $SOPayorKey = null;

  public ?int $SOKey = null;

  public ?int $PayorLevelKey = null;

  public ?string $PolicyNumber = null;

  public ?int $PayorKey = null;

  public ?string $StartDateTime = null;

  public ?string $EndDateTime = null;

  public ?bool $Verified = null;

  public ?string $InsuranceCompanyName = null;

  public ?string $InsuranceCompanyPhone = null;
}
