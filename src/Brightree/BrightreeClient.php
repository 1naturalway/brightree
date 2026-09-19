<?php

namespace Brightree;

use Brightree\Services\DoctorService;
use Brightree\Services\PatientService;
use Brightree\Services\PricingService;
use Brightree\Services\SecurityService;
use Brightree\Services\InsuranceService;
use Brightree\Services\InventoryService;
use Brightree\Services\SalesOrderService;
use Brightree\Services\CustomFieldService;
use Brightree\Services\ReferenceDataService;
use Brightree\Services\PatientBillingService;
use Brightree\Services\PickupExchangeService;
use Brightree\Services\DocumentManagementService;

class BrightreeClient {
  /**
   * Default SSL stream context options.
   *
   * Peer verification is off by default because that is how this client has
   * always talked to Brightree; turning it on here would change the behaviour
   * of every existing installation. Override any of these per-installation via
   * the 'ssl' key, e.g.:
   *
   *   new BrightreeClient([
   *     'username' => '...',
   *     'password' => '...',
   *     'ssl' => ['verify_peer' => true, 'verify_peer_name' => true, 'allow_self_signed' => false],
   *   ]);
   *
   * @var array<string, mixed>
   */
  public const DEFAULT_SSL_OPTIONS = [
    'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true,
  ];

  /**
   * Default SoapClient options, overridable via the 'soap' key.
   *
   * Brightree's WSDLs are large (SalesOrderService is ~388 KB) and change
   * only when Brightree ships a new service version, so they are cached to
   * disk — PHP's own default — rather than refetched per call. Pass
   * 'soap' => ['cache_wsdl' => WSDL_CACHE_NONE] to opt out while developing
   * against a changing WSDL; soap.wsdl_cache_ttl in php.ini controls how long
   * a cached copy lives.
   *
   * @var array<string, mixed>
   */
  public const DEFAULT_SOAP_OPTIONS = [
    'trace' => 1,
    'exceptions' => true,
    'cache_wsdl' => WSDL_CACHE_DISK,
    'keep_alive' => false,
  ];

  private array $params;

  /**
   * @param array{
   *   username: string,
   *   password: string,
   *   ssl?: array<string, mixed>,
   *   soap?: array<string, mixed>
   * } $params
   */
  public function __construct(array $params) {
    $ssl = array_merge(self::DEFAULT_SSL_OPTIONS, $params['ssl'] ?? []);
    $soap = array_merge(self::DEFAULT_SOAP_OPTIONS, $params['soap'] ?? []);

    $this->params = $soap + [
      'login' => $params['username'],
      'password' => $params['password'],
      'stream_context' => stream_context_create(['ssl' => $ssl]),
    ];
  }

  /**
   * The resolved SoapClient options, as handed to every service.
   *
   * @return array<string, mixed>
   */
  public function params(): array {
    return $this->params;
  }

  public function customFieldService(): CustomFieldService {
    return new CustomFieldService($this->params);
  }

  public function doctorService(): DoctorService {
    return new DoctorService($this->params);
  }

  public function documentManagementService(): DocumentManagementService {
    return new DocumentManagementService($this->params);
  }

  public function insuranceService(): InsuranceService {
    return new InsuranceService($this->params);
  }

  public function inventoryService(): InventoryService {
    return new InventoryService($this->params);
  }

  public function patientBillingService(): PatientBillingService {
    return new PatientBillingService($this->params);
  }

  public function patientService(): PatientService {
    return new PatientService($this->params);
  }

  public function pickupExchangeService(): PickupExchangeService {
    return new PickupExchangeService($this->params);
  }

  public function pricingService(): PricingService {
    return new PricingService($this->params);
  }

  public function referenceDataService(): ReferenceDataService {
    return new ReferenceDataService($this->params);
  }

  public function salesOrderService(): SalesOrderService {
    return new SalesOrderService($this->params);
  }

  public function securityService(): SecurityService {
    return new SecurityService($this->params);
  }
}
