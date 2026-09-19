<?php

namespace Brightree\SalesOrder;

/**
 * Wrapper for the WSDL's ArrayOfSalesOrderPharmacyItemInfo, whose repeating
 * child element is named SalesOrderPharmacyItemInfo.
 */
class SalesOrderPharmacyItems {
  public SalesOrderPharmacyItemInfo $SalesOrderPharmacyItemInfo;

  public function __construct() {
    $this->SalesOrderPharmacyItemInfo = new SalesOrderPharmacyItemInfo();
  }

  public function setSalesOrderPharmacyItemInfo(SalesOrderPharmacyItemInfo $SalesOrderPharmacyItemInfo): self {
    $this->SalesOrderPharmacyItemInfo = $SalesOrderPharmacyItemInfo;
    return $this;
  }
}
