<?php

namespace Brightree\FrameworkSupport\Laravel;

use Illumniate\Support\Facades\Facade;

class BrightreeFacade extends Facade {
  protected static function getFacadeAccessor() {
    return 'brightree';
  }
}
