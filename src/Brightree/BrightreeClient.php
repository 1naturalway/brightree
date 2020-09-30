<?php

namespace Brightree;

use Brightree\Services\DoctorService;
use Brightree\Services\InsuranceService;
use Brightree\Services\PatientService;
use Brightree\Services\ReferenceDataService;
use Brightree\Services\SalesOrderService;
use Brightree\Services\CustomFieldService;
use Brightree\Services\DocumentManagementService;
use Brightree\Services\InventoryService;

class BrightreeClient {
  private $params;

  function __construct($params) {
    $this->params = [
      'login' => $params['username'],
      'password' => $params['password'],
      'trace' => 1,
      'exceptions' => true,
      'cache_wsdl' => WSDL_CACHE_NONE,
      'stream_context' => stream_context_create(array(
        'ssl' => array(
            'crypto_method' =>  STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
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

  public function CustomFieldService() {
    return new CustomFieldService($this->params);
  }

  public function DocumentManagementService() {
    return new DocumentManagementService($this->params);
  }

  public function InventoryService() {
    return new InventoryService($this->params);
  }
}
