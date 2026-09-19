<?php

namespace Brightree\Services;

use Brightree\Traits\CustomTrait;

/**
 * Base for the concrete service classes.
 *
 * Kept concrete rather than abstract so it can still be used directly as an
 * escape hatch for operations this library does not wrap yet:
 *
 *   $service = new BaseService($client->params());
 *   $service->wsdl_path = 'https://webservices.brightree.net/.../Foo.svc?singleWsdl';
 *   $service->custom('SomeOperation', ['Key' => $value]);
 */
class BaseService {
  use CustomTrait;

  public array $params;

  /**
   * WSDL endpoint for this service. Concrete services set this in their
   * constructor; defaulted so the property is never uninitialised.
   */
  public string $wsdl_path = '';

  public function __construct(array $params) {
    $this->params = $params;
  }
}
