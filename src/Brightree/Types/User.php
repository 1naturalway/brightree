<?php

namespace Brightree\Types;

/**
 * Generated from the User type in UserSecurityService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class User {
  public ?int $BrightreeID = null;

  public ?UserDocumentManagementInfo $UserDocumentManagementInfo = null;

  public ?UserGeneralInfo $UserGeneralInfo = null;

  public ?UserSecurityInfo $UserSecurityInfo = null;
}
