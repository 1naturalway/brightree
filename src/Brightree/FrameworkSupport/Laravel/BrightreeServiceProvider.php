<?php

namespace Brightree\FrameworkSupport\Laravel;

use Illuminate\Support\ServiceProvider;
use onenaturalway\Brightree;

class BrightreeServiceProvider extends ServiceProvider {

  public function boot() {
    $config = __DIR__ . '/config/config.php';
    $this->mergeConfigFrom($config, 'brightree');
    $this->publishes([$config => config_path('brightree.php')]);
  }

  public function register() {
    $this->app->singleton('brightree', function ($app) {
      return new BrightreeClient(config('brightree'));
    });
  }
  public function provides() {
    return array('brightree');
  }
}
