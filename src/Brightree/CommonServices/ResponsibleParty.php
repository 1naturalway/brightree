<?php

namespace Brightree\CommonServices;

use Brightree\Enums\PatientContactType;
use Brightree\Enums\ResponsiblePartyType;

/**
 * The WSDL's ResponsibleParty type (Contact -> PatientContact ->
 * ResponsibleParty, flattened). It is carried by the element named
 * PatientGeneralInfo/ResponsiblePartyContact, which is what this class used
 * to be named after.
 */
class ResponsibleParty {
  public Address $Address;

  public ?string $EmailAddress = null;

  public ?string $FaxNumber = null;

  public ?string $MobilePhone = null;

  public Name $Name;

  public ?string $PhoneNumber = null;

  public PatientContactType|string|null $ContactType = null;

  public ResponsiblePartyType|string|null $ResponsiblePartyType = null;

  public function __construct() {
    $this->Address = new Address();
    $this->Name = new Name();
  }

  public function setAddress(Address $Address): self {
    $this->Address = $Address;

    return $this;
  }

  public function setEmailAddress(?string $EmailAddress): self {
    $this->EmailAddress = $EmailAddress;

    return $this;
  }

  public function setFaxNumber(?string $FaxNumber): self {
    $this->FaxNumber = $FaxNumber;

    return $this;
  }

  public function setMobilePhone(?string $MobilePhone): self {
    $this->MobilePhone = $MobilePhone;

    return $this;
  }

  public function setName(Name $Name): self {
    $this->Name = $Name;

    return $this;
  }

  public function setPhoneNumber(?string $PhoneNumber): self {
    $this->PhoneNumber = $PhoneNumber;

    return $this;
  }

  public function setContactType(PatientContactType|string|null $ContactType): self {
    $this->ContactType = $ContactType;

    return $this;
  }

  public function setResponsiblePartyType(ResponsiblePartyType|string|null $ResponsiblePartyType): self {
    $this->ResponsiblePartyType = $ResponsiblePartyType;

    return $this;
  }
}
