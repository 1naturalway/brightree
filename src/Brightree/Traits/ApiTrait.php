<?php

namespace Brightree\Traits;

use SoapClient;

trait ApiTrait {
  public function apiCall($call, $query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);

    unset($client); // Closes the SOAP connection
    gc_collect_cycles(); // Force cleanup in long-running workers

    return $response;
  }
}
