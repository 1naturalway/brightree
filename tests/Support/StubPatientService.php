<?php

namespace Brightree\Tests\Support;

use Brightree\Services\PatientService;

/**
 * PatientService with the transport removed.
 *
 * apiCall() is the single seam every wrapper method goes through, so replacing
 * it exercises the argument building and the response handling around it
 * without a WSDL, a client or a network.
 */
final class StubPatientService extends PatientService {
  /** Handed back from every apiCall(). */
  public mixed $response = null;

  /** @var array<int, array{operation: string, query: mixed}> */
  public array $calls = [];

  public function __construct() {
    parent::__construct([]);
  }

  public function apiCall(string $call, mixed $query): mixed {
    $this->calls[] = ['operation' => $call, 'query' => $query];

    return $this->response;
  }

  /**
   * @return array{operation: string, query: mixed}
   */
  public function lastCall(): array {
    return $this->calls[array_key_last($this->calls)];
  }
}
