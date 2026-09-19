<?php

namespace Brightree\Tests\Support\Dto;

/**
 * Not a shape any Brightree WSDL declares. It exists only so the hydrator's
 * depth cap can be reached, which no real response comes close to.
 */
class Recursive {
  public ?Recursive $Next = null;

  public ?string $Inner = null;
}
