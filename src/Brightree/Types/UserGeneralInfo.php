<?php

namespace Brightree\Types;

/**
 * Generated from the UserGeneralInfo type in UserSecurityService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class UserGeneralInfo {
  public ?BranchInfo $BranchOffice = null;

  public ?string $EmailAddress = null;

  public ?string $EmployeeID = null;

  public ?string $FirstName = null;

  public ?bool $Inactive = null;

  public ?string $LastName = null;

  public ?string $LoginName = null;

  public ?string $MiddleName = null;

  public ?string $Password = null;

  public ?int $UserGroupBrightreeID = null;
}
