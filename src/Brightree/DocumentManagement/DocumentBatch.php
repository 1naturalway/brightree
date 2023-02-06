<?php

namespace Brightree\DocumentManagement;

use Brightree\ApiMessageServices\LookupValue;

class DocumentBatch {
  public $BatchDescription;

  public $BatchName;

  public $BatchOwner;

  public $BrightreeID;

  public $Closed;

  public function __construct() {
    $this->BatchOwner = new LookupValue();
  }

  public function setBatchDescription($BatchDescription) {
    $this->BatchDescription = $BatchDescription;
    return $this;
  }

  public function setBatchName($BatchName) {
    $this->BatchName = $BatchName;
    return $this;
  }

  public function setBatchOwner($BatchOwner) {
    $this->BatchOwner = $BatchOwner;
    return $this;
  }

  public function setBrightreeID($BrightreeID) {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setClosed($Closed) {
    $this->Closed = $Closed;
    return $this;
  }
}
