<?php

namespace Brightree\Types;

/**
 * Generated from the DocumentSearchRequest type in DocumentManagementService.wsdl.
 *
 * Regenerate with: php tools/generate-types.php
 */
class DocumentSearchRequest {
  public ?int $BranchKey = null;

  public ?int $DocumentBatchKey = null;

  public ?string $DocumentDateFrom = null;

  public ?string $DocumentDateTo = null;

  public ?int $DocumentReviewReasonKey = null;

  public ?int $DocumentReviewStatusKey = null;

  public ?int $DocumentTypeKey = null;

  public ?string $ExternalDocumentID = null;

  public ?string $ModifiedDateFrom = null;

  public ?string $ModifiedDateTo = null;

  public ?string $PatientAccountNumber = null;

  public ?string $PatientExternalID = null;

  public ?int $PatientID = null;

  public ?int $PatientKey = null;

  public ?int $SalesOrderKey = null;

  public ?string $ScannedDateFrom = null;

  public ?string $ScannedDateTo = null;
}
