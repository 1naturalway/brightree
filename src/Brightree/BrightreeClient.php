<?php

namespace Brightree;

use Brightree\ApiMessageServices\CustomFieldValue;
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

  public function __construct($params) {
    $this->params = [
      'login' => $params['username'],
      'password' => $params['password'],
      'trace' => 1,
      'exceptions' => true,
      'cache_wsdl' => WSDL_CACHE_NONE,
      'stream_context' => stream_context_create(array(
        'ssl' => array(
            'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ))),
    ];
  }

  public function doctorService(): DoctorService {
    return new DoctorService($this->params);
  }

  public function insuranceService(): InsuranceService {
    return new InsuranceService($this->params);
  }

  public function patientService(): PatientService {
    return new PatientService($this->params);
  }

  public function referenceDataService(): ReferenceDataService {
    return new ReferenceDataService($this->params);
  }

  public function salesOrderService(): SalesOrderService {
    return new SalesOrderService($this->params);
  }

  public function customFieldService(): CustomFieldService {
    return new CustomFieldService($this->params);
  }

  public function documentManagementService(): DocumentManagementService {
    return new DocumentManagementService($this->params);
  }

  public function inventoryService(): InventoryService {
    return new InventoryService($this->params);
  }
}
