<?php

namespace Brightree\Tests\Support;

use SoapClient;

/**
 * A SoapClient that encodes the request for real and then keeps it instead of
 * sending it.
 *
 * Everything up to __doRequest() — WSDL binding, type lookup, the encoder that
 * decides whether an element is emitted, omitted or nilled — is ext-soap's own
 * code, so a request captured here is the request Brightree would have
 * received. No socket is ever opened.
 */
class RecordingSoapClient extends SoapClient {
  /** @var string[] */
  public array $requests = [];

  /**
   * Returned verbatim from __doRequest(). A caller that only cares about the
   * request can leave the default, which is a well-formed empty body.
   */
  public string $response = '<?xml version="1.0" encoding="utf-8"?><s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/"><s:Body/></s:Envelope>';

  public function __doRequest(
      string $request,
      string $location,
      string $action,
      int $version,
      bool $oneWay = false,
      ?string $uriParserClass = null
  ): ?string {
    $this->requests[] = $request;

    return $this->response;
  }

  /**
   * The request from the most recent call, which is what every assertion in
   * this suite looks at.
   */
  public function lastRequest(): string {
    if ($this->requests === []) {
      throw new \RuntimeException('No SOAP request was captured; the operation never reached the client.');
    }

    return $this->requests[array_key_last($this->requests)];
  }
}
