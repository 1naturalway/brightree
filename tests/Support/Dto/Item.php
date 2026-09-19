<?php

namespace Brightree\Tests\Support\Dto;

/**
 * Note what is missing: the schema's Item carries a ServerNote the service
 * returns and does not accept, exactly as Brightree's response types are
 * sometimes supersets of its request types.
 */
class Item {
  public ?int $Id = null;

  public ?string $Label = null;

  /** Declared float, though xs:decimal arrives from ext-soap as a string. */
  public ?float $Amount = null;

  /** @var Tag[] */
  public array $Tags = [];
}
