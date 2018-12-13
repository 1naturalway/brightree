<?php

namespace Brightree\FrameworkSupport\Laravel;

use Illuminate\Support\Facades\Facade;

class BrightreeFacade extends Facade {
  protected static function getFacadeAccessor() {
    return 'brightree';
  }
}
