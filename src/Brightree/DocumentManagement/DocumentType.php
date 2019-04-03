<?php

namespace Brightree\DocumentServices;

use Brightree\ApiMessageServices\LookupValue;

class DocumentBatch {
  public $DocumentTypeBrightreeID;
  public $Description;
  public $DocumentCategory;
  public $DocumentReviewMode;
  public $DocumentRulesEnabled;
  public $Enabled;
  public $Name;

  public function __construct() {
    $this->DocumentCategory = new LookupValue();
  }

  public function setDocumentTypeBrightreeID($DocumentTypeBrightreeID) {
    $this->DocumentTypeBrightreeID = $DocumentTypeBrightreeID;
    return $this;
  }

  public function setDescription($Description) {
    $this->Description = $Description;

    return $this;
  }

  public function setDocumentCategory($DocumentCategory) {
    $this->DocumentCategory = $DocumentCategory;
    return $this;
  }

  public function setDocumentReviewMode($DocumentReviewMode) {
    $this->DocumentReviewMode = $DocumentReviewMode;
    return $this;
  }

  public function setDocumentRulesEnabled($DocumentRulesEnabled) {
    $this->DocumentRulesEnabled = $DocumentRulesEnabled;
    return $this;
  }

  public function setEnabled($Enabled) {
    $this->Enabled = $Enabled;
    return $this;
  }

  public function setName($Name) {
    $this->Name = $Name;
    return $this;
  }
}
