<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;
use Brightree\CommonServices\Invoice;

class PatientBillingService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1909/InvoiceService/InvoiceService.svc?singleWsdl";
  }

  public function invoiceFetchByInvoiceID($InvoiceNumber) {
    return $this->apiCall('InvoiceFetchByInvoiceID', ['InvoiceNumber' => $InvoiceNumber]);
  }

  public function invoiceFetchByBrightreeID($BrightreeID) {
    return $this->apiCall('InvoiceFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
  }

  public function invoiceUpdate($BrightreeID, $PatientBrightreeId, Invoice $invoice) {
    return $this->apiCall('InvoiceUpdate', ['BrightreeID' => $BrightreeID, 'PatientBrightreeId' => $PatientBrightreeId, 'Invoice' => $invoice]);
  }
}
