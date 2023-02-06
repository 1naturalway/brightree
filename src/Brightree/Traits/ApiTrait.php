<?php

namespace Brightree\Traits;

use SoapClient;

trait ApiTrait {
  public function apiCall($call, $query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }
}
