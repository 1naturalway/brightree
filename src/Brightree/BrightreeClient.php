<?php

namespace Brightree;

use SoapClient;
use Brightree\Services\PatientService;
use Brightree\Services\SalesOrderService;

class BrightreeClient {
  private $params;

  function __construct($params) {
    $this->params = [
      'login' => $params['username'],
      'password' => $params['password'],
      'trace' => 1,
      'stream_context' => stream_context_create(array(
        'ssl' => array(
            'crypto_method' =>  STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
        )
     ))
    ];
  }

  public function apiCall($call,$query) {
    $client = new SoapClient($this->wsdl, $this->params);
    $response = $client->$call($query);
    return $response;
  }

  public function SalesOrderService() {
    return new SalesOrderService($this->params);
  }

  public function PatientService() {
    return new PatientService($this->params);
  }

  public function referenceDataService() {
    return new referenceDataService($this->params);
  }
}
