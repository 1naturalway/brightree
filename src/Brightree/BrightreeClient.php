<?php

namespace Brightree;

use Brightree\Services\DoctorService;
use Brightree\Services\InsuranceService;
use Brightree\Services\PatientService;
use Brightree\Services\ReferenceDataService;
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

  public function DoctorService() {
    return new DoctorService($this->params);
  }

  public function InsuranceService() {
    return new InsuranceService($this->params);
  }

  public function PatientService() {
    return new PatientService($this->params);
  }

  public function ReferenceDataService() {
    return new ReferenceDataService($this->params);
  }

  public function SalesOrderService() {
    return new SalesOrderService($this->params);
  }
}
