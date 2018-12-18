<?php

namespace Brightree\Services;

use SoapClient;

class DoctorService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1610/DoctorService/DoctorService.svc?singleWsdl";
  }

  public function apiCall($call,$query) {
    $client = new SoapClient($this->wsdl_path, $this->params);
    $response = $client->$call($query);
    return $response;
  }
}
