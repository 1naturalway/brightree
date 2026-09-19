<?php

namespace Brightree\Traits;

use Brightree\Soap\RequestPruner;
use Brightree\Soap\SoapClientFactory;
use RuntimeException;

/**
 * Depends on $wsdl_path, $params and $prune, which BaseService declares. The
 * trait is only meant to be composed into that class or a subclass of it.
 */
trait ApiTrait {
  public function apiCall(string $call, mixed $query): mixed {
    if ($this->wsdl_path === '') {
      throw new RuntimeException(
          static::class . ' has no wsdl_path set; assign one before calling ' . $call . '().'
      );
    }

    if ($this->prune) {
      $query = RequestPruner::payload($query);
    }

    return SoapClientFactory::make($this->wsdl_path, $this->params)->$call($query);
  }
}
