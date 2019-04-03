<?php

namespace Brightree\DocumentServices;

class DocumentBatchSearchRequest {
  public $BatchDescription;
  public $BatchName;
  public $BatchOwnerBrightreeID;
  public $BatchOwnerFullName;
  public $BrightreeID;
  public $Closed;
  public $CreatedDate;


  public function setBatchDescription($BatchDescription) {
    $this->BatchDescription = $BatchDescription;
    return $this;
  }

  public function setBatchName($BatchName) {
    $this->BatchName = $BatchName;
    return $this;
  }

  public function setBatchOwnerBrightreeID($BatchOwnerBrightreeID) {
    $this->BatchOwnerBrightreeID = $BatchOwnerBrightreeID;
    return $this;
  }

  public function setBatchOwnerFullName($BatchOwnerFullName) {
    $this->BatchOwnerFullName = $BatchOwnerFullName;
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

  public function setCreatedDate($CreatedDate) {
    $this->CreatedDate = $CreatedDate;
    return $this;
  }
}
