<?php

namespace Brightree\Types;

/**
 * Generated from the PickupExchangeValidationDetailMessage type in PickupExchangeService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class PickupExchangeValidationDetailMessage {
  public ?int $BrightreeDetailID = null;

  /** @var DetailExchangeValidationMessages[] */
  public array $DetailExchangeMessages = [];

  /** @var string[] */
  public array $DetailMessages = [];
}
