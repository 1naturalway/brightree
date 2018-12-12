<?php

namespace onenaturalway\Brightree;

class OrderEntryService {
  private $params;

  function __construct($params) {
    $this->params = $params;
  }

  public function apiCall($call,$query) {
    $client = new SoapClient($this->wsdl, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function call(){
    return "Blah";
  }
}
