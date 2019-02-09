<?php

namespace Brightree\Traits;

use SoapClient;

trait ApiTrait {
  public function ApiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }
}
