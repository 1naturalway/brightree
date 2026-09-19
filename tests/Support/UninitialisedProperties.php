<?php

namespace Brightree\Tests\Support;

/**
 * A DTO shape with a typed property that is never assigned.
 *
 * get_object_vars() leaves an uninitialised typed property out entirely, which
 * is what lets the pruner tell "never set" apart from "set to null". Reading
 * $Foo before assignment would be an Error, so nothing may touch it.
 */
class UninitialisedProperties {
  public string $Foo;

  public ?string $Bar = 'kept';
}
