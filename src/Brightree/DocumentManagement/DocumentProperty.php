<?php

namespace Brightree\DocumentManagement;

/**
 * One entry in a document property bag.
 *
 * The WSDL types these bags as ArrayOfKeyValueOfintstring — a WCF dictionary,
 * which on the wire is a list of <KeyValueOfintstring><Key/><Value/></...>
 * nodes rather than the PHP associative array the shape suggests. Handing
 * SoapClient ['101' => 'Smith'] serialises to an empty <PropertyBag/> with no
 * error, so the document is stored with none of its properties set.
 *
 * DocumentManagementService::propertyBag() converts either shape into a list
 * of these, so callers can keep passing the associative array they expect to.
 */
class DocumentProperty {
  public ?int $Key = null;

  public ?string $Value = null;

  public function __construct(?int $Key = null, ?string $Value = null) {
    $this->Key = $Key;
    $this->Value = $Value;
  }

  public function setKey(?int $Key): self {
    $this->Key = $Key;

    return $this;
  }

  public function setValue(?string $Value): self {
    $this->Value = $Value;

    return $this;
  }
}
