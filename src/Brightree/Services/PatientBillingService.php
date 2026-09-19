<?php

namespace Brightree\Services;

use Brightree\CommonServices\Invoice;
use Brightree\Services\BaseService;
use Brightree\Types\InvoiceDetail;

class PatientBillingService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/InvoiceService/InvoiceService.svc?singleWsdl";
  }

  public function invoiceFetchByInvoiceID(?string $InvoiceID): mixed {
    return $this->apiCall('InvoiceFetchByInvoiceID', ['InvoiceID' => $InvoiceID]);
  }

  public function invoiceFetchByBrightreeID(?int $BrightreeID): mixed {
    return $this->apiCall('InvoiceFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
  }

  /**
   * @param Invoice $invoice
   */
  public function invoiceUpdate(?int $BrightreeID, ?int $PatientBrightreeId, Invoice $invoice): mixed {
    return $this->apiCall('InvoiceUpdate', ['BrightreeId' => $BrightreeID, 'PatientBrightreeId' => $PatientBrightreeId, 'Invoice' => $invoice]);
  }

  public function invoiceCreatePrintActivity(?int $BrightreeID = null): mixed {
    return $this->apiCall('InvoiceCreatePrintActivity', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  /**
   * @param InvoiceDetail|null $InvoiceItem
   */
  public function invoiceItemUpdate(?int $BrightreeId = null, ?int $InvoiceBrightreeId = null, ?int $PatientBrightreeId = null, mixed $InvoiceItem = null): mixed {
    return $this->apiCall('InvoiceItemUpdate', [
      'BrightreeId' => $BrightreeId,
      'InvoiceBrightreeId' => $InvoiceBrightreeId,
      'PatientBrightreeId' => $PatientBrightreeId,
      'InvoiceItem' => $InvoiceItem
    ]);
  }

  public function openInvoiceAgedBalanceFetchByPatient(?int $PatientBrightreeID = null): mixed {
    return $this->apiCall('OpenInvoiceAgedBalanceFetchByPatient', [
      'PatientBrightreeID' => $PatientBrightreeID
    ]);
  }

  public function openInvoiceBalanceFetchByPatient(?int $PatientBrightreeID = null): mixed {
    return $this->apiCall('OpenInvoiceBalanceFetchByPatient', [
      'PatientBrightreeID' => $PatientBrightreeID
    ]);
  }

  public function resubmitInvoices(?array $InvoiceIDs = null, ?bool $ResubmitLineItemsWithBalanceOnly = null): mixed {
    return $this->apiCall('ResubmitInvoices', [
      'InvoiceIDs' => $InvoiceIDs,
      'ResubmitLineItemsWithBalanceOnly' => $ResubmitLineItemsWithBalanceOnly
    ]);
  }
}
