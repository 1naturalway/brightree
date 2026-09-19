<?php

namespace Brightree\CommonServices;

class Invoice {
  public ?int $BrightreeID = null;

  public ClinicalInfo $ClinicalInfo;

  public ?string $ExternalID = null;

  public InvoiceGeneralInfo $InvoiceGeneralInfo;

  public InvoicePatientInfo $InvoicePatientInfo;

  public InvoicePolicyInfo $InvoicePolicyInfo;

  public InvoiceBalanceInfo $InvoiceBalanceInfo;

  /** @var \Brightree\Types\InvoiceDetail[]|null */
  public ?array $InvoiceItems = null;

  /** @var \Brightree\Types\RelatedInvoice[]|null */
  public ?array $RelatedInvoices = null;

  public function __construct() {
    $this->ClinicalInfo = new ClinicalInfo();
    $this->InvoiceGeneralInfo = new InvoiceGeneralInfo();
    $this->InvoicePatientInfo = new InvoicePatientInfo();
    $this->InvoicePolicyInfo = new InvoicePolicyInfo();
    $this->InvoiceBalanceInfo = new InvoiceBalanceInfo();
  }
}
