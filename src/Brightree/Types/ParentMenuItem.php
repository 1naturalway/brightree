<?php

namespace Brightree\Types;

/**
 * Generated from the ParentMenuItem type in UserSecurityService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class ParentMenuItem {
  public ?int $BrightreeID = null;

  /** @var MenuItem[] */
  public array $MenuItems = [];

  public ?string $Name = null;
}
