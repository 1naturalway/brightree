<?php

namespace Brightree\Tests\Support\Dto;

use Brightree\Tests\Support\Kind;

/**
 * A request DTO for the Thing type in tests/Fixtures/encoder-contract.wsdl,
 * written the way the real Brightree DTOs are: nullable scalars defaulting to
 * null, collections as plain arrays with an item type in the docblock, and a
 * nested object built up front so callers can assign straight through it.
 */
class Thing {
  public ?string $Name = null;

  public ?int $Count = null;

  public ?bool $Flag = null;

  public Child $Child;

  /** @var Item[] */
  public array $Items = [];

  /** Mirrors the hand-written DTOs, which accept a case or a raw string. */
  public Kind|string|null $Kind = null;

  /** Mirrors the generated DTOs, which declare the enum and nothing else. */
  public ?Kind $StrictKind = null;

  public ?string $Blob = null;

  public function __construct() {
    $this->Child = new Child();
  }
}
