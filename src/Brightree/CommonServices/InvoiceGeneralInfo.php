<?php

namespace Brightree\CommonServices;

use Brightree\ApiMessageServices\LookupValue;

class InvoiceGeneralInfo {
  public ?bool $BillingStatementHold = null;

  public ?string $CorrectionType = null;

  public ?string $CreatedDate = null;

  public ?string $DOSDt = null;

  public ?string $DateOpened = null;

  public LookupValue $DelayReason;

  public ?string $InvoiceNumber = null;

  public ?string $InvoiceStatus = null;

  public ?string $LastPrinted = null;

  public ?string $LastSubmitted = null;

  public ?bool $MedicareDeductibleHold = null;

  public ?string $Note = null;

  public ?string $OriginalClaimNumber = null;

  public ?bool $ReprintOrReSubmitClaim = null;

  public ?int $SalesOrderBrightreeID = null;

  public ?bool $SpanDateHold = null;

  public ?string $StatementDueDate = null;

  public ?string $StatementPrintDate = null;

  public ?bool $SubmissionOrPrintHold = null;

  public ?bool $UserManualHold = null;

  public function __construct() {
    $this->DelayReason = new LookupValue();
  }

  public function setBillingStatementHold(?bool $BillingStatementHold): self {
    $this->BillingStatementHold = $BillingStatementHold;
    return $this;
  }

  public function setCorrectionType(?string $CorrectionType): self {
    $this->CorrectionType = $CorrectionType;
    return $this;
  }

  public function setCreatedDate(?string $CreatedDate): self {
    $this->CreatedDate = $CreatedDate;
    return $this;
  }

  public function setDOSDt(?string $DOSDt): self {
    $this->DOSDt = $DOSDt;
    return $this;
  }

  public function setDateOpened(?string $DateOpened): self {
    $this->DateOpened = $DateOpened;
    return $this;
  }

  public function setDelayReason(LookupValue $DelayReason): self {
    $this->DelayReason = $DelayReason;
    return $this;
  }

  public function setInvoiceNumber(?string $InvoiceNumber): self {
    $this->InvoiceNumber = $InvoiceNumber;
    return $this;
  }

  public function setInvoiceStatus(?string $InvoiceStatus): self {
    $this->InvoiceStatus = $InvoiceStatus;
    return $this;
  }

  public function setLastPrinted(?string $LastPrinted): self {
    $this->LastPrinted = $LastPrinted;
    return $this;
  }

  public function setLastSubmitted(?string $LastSubmitted): self {
    $this->LastSubmitted = $LastSubmitted;
    return $this;
  }

  public function setMedicareDeductibleHold(?bool $MedicareDeductibleHold): self {
    $this->MedicareDeductibleHold = $MedicareDeductibleHold;
    return $this;
  }

  public function setNote(?string $Note): self {
    $this->Note = $Note;
    return $this;
  }

  public function setOriginalClaimNumber(?string $OriginalClaimNumber): self {
    $this->OriginalClaimNumber = $OriginalClaimNumber;
    return $this;
  }

  public function setReprintOrReSubmitClaim(?bool $ReprintOrReSubmitClaim): self {
    $this->ReprintOrReSubmitClaim = $ReprintOrReSubmitClaim;
    return $this;
  }

  public function setSalesOrderBrightreeID(?int $SalesOrderBrightreeID): self {
    $this->SalesOrderBrightreeID = $SalesOrderBrightreeID;
    return $this;
  }

  public function setSpanDateHold(?bool $SpanDateHold): self {
    $this->SpanDateHold = $SpanDateHold;
    return $this;
  }

  public function setStatementDueDate(?string $StatementDueDate): self {
    $this->StatementDueDate = $StatementDueDate;
    return $this;
  }

  public function setStatementPrintDate(?string $StatementPrintDate): self {
    $this->StatementPrintDate = $StatementPrintDate;
    return $this;
  }

  public function setSubmissionOrPrintHold(?bool $SubmissionOrPrintHold): self {
    $this->SubmissionOrPrintHold = $SubmissionOrPrintHold;
    return $this;
  }

  public function setUserManualHold(?bool $UserManualHold): self {
    $this->UserManualHold = $UserManualHold;
    return $this;
  }
}
