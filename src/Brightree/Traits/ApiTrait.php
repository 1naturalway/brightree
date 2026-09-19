<?php

namespace Brightree\Traits;

use RuntimeException;
use SoapClient;

trait ApiTrait {
  public function apiCall(string $call, mixed $query): mixed {
    if ($this->wsdl_path === '') {
      throw new RuntimeException(
          static::class . ' has no wsdl_path set; assign one before calling ' . $call . '().'
      );
    }

    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);

    unset($client); // Closes the SOAP connection
    gc_collect_cycles(); // Force cleanup in long-running workers

    return $response;
  }
}
