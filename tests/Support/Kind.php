<?php

namespace Brightree\Tests\Support;

/**
 * Stands in for the generated Brightree\Enums\* cases. Its values match the
 * enumeration in tests/Fixtures/encoder-contract.wsdl.
 */
enum Kind: string {
  case Alpha = 'Alpha';

  case Beta = 'Beta';
}
