<?php

namespace Brightree\CommonServices;

class Invoice {
  public $BrightreeID;

  public $ExternalId;

  public $InvoiceGeneralInfo;

  public $InvoicePatientInfo;

  public $InvoicePolicyInfo;

  public $InvoiceBalanceInfo;

  public $InvoiceItems;

  public $RelatedInvoice;

  public function __construct() {
  }
}
