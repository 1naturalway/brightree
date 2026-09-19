<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\BrightShip;
use Brightree\ApiMessageServices\PointOfDeliveryInfo;
use Brightree\ApiMessageServices\LookupValue;

class SalesOrder {
  public BrightShip $BrightShip;

  public ?int $BrightreeID = null;

  public DeliveryInfo $DeliveryInfo;

  public ?string $ExternalID = null;

  public ?LookupValue $MyFormsWorkflowStatus = null;

  public PointOfDeliveryInfo $PointOfDeliveryInfo;

  public ?string $QMBStatus = null;

  public SalesOrderAuditInfo $SalesOrderAuditInfo;

  public SalesOrderAutoConfirmInfo $SalesOrderAutoConfirmInfo;

  public SalesOrderClinicalInfo $SalesOrderClinicalInfo;

  public SalesOrderGeneralInfo $SalesOrderGeneralInfo;

  public SalesOrderInsuranceInfo $SalesOrderInsuranceInfo;

  public SalesOrderItems $SalesOrderItems;

  public SalesOrderMessages $SalesOrderMessages;

  public SalesOrderPharmacyItems $SalesOrderPharmacyItems;

  public SalesOrderWIPInfo $SalesOrderWIPInfo;

  public ShippingTrackingInfos $ShippingTrackingInfos;

  public function __construct() {
    $this->BrightShip = new BrightShip();
    $this->DeliveryInfo = new DeliveryInfo();
    $this->PointOfDeliveryInfo = new PointOfDeliveryInfo();
    $this->SalesOrderAuditInfo = new SalesOrderAuditInfo();
    $this->SalesOrderAutoConfirmInfo = new SalesOrderAutoConfirmInfo();
    $this->SalesOrderClinicalInfo = new SalesOrderClinicalInfo();
    $this->SalesOrderGeneralInfo = new SalesOrderGeneralInfo();
    $this->SalesOrderInsuranceInfo = new SalesOrderInsuranceInfo();
    $this->SalesOrderMessages = new SalesOrderMessages();
    $this->SalesOrderWIPInfo = new SalesOrderWIPInfo();
    $this->SalesOrderItems = new SalesOrderItems();
    $this->SalesOrderPharmacyItems = new SalesOrderPharmacyItems();
    $this->ShippingTrackingInfos = new ShippingTrackingInfos();
  }

  public function getBrightShip(BrightShip $brightship): void {
    $this->BrightShip = $brightship;
  }

  public function setDeliveryInfo(DeliveryInfo $info): void {
    $this->DeliveryInfo = $info;
  }

  public function getPointOfDeliveryInfo(PointOfDeliveryInfo $pointOfDeliveryInfo): void {
    $this->PointOfDeliveryInfo = $pointOfDeliveryInfo;
  }

  public function getSalesOrderAuditInfo(SalesOrderAuditInfo $salesOrderAuditInfo): void {
    $this->SalesOrderAuditInfo = $salesOrderAuditInfo;
  }

  public function getSalesOrderAutoConfirmInfo(SalesOrderAutoConfirmInfo $salesOrderAutoConfirmInfo): void {
    $this->SalesOrderAutoConfirmInfo = $salesOrderAutoConfirmInfo;
  }

  public function getSalesOrderClinicalInfo(SalesOrderClinicalInfo $salesOrderClinicalInfo): void {
    $this->SalesOrderClinicalInfo = $salesOrderClinicalInfo;
  }

  public function getSalesOrderGeneralInfo(SalesOrderGeneralInfo $salesOrderGeneralInfo): void {
    $this->SalesOrderGeneralInfo = $salesOrderGeneralInfo;
  }

  public function getSalesOrderInsuranceInfo(SalesOrderInsuranceInfo $salesOrderInsuranceInfo): void {
    $this->SalesOrderInsuranceInfo = $salesOrderInsuranceInfo;
  }

  public function getSalesOrderMessages(SalesOrderMessages $salesOrderMessages): void {
    $this->SalesOrderMessages = $salesOrderMessages;
  }

  public function getSalesOrderWIPInfo(SalesOrderWIPInfo $salesOrderWIPInfo): void {
    $this->SalesOrderWIPInfo = $salesOrderWIPInfo;
  }

  public function setBrightreeID(?int $BrightreeID): self {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setExternalID(?string $ExternalID): self {
    $this->ExternalID = $ExternalID;
    return $this;
  }

  public function setPointOfDeliveryInfo(PointOfDeliveryInfo $PointOfDeliveryInfo): self {
    $this->PointOfDeliveryInfo = $PointOfDeliveryInfo;
    return $this;
  }

  public function setQMBStatus(?string $QMBStatus): self {
    $this->QMBStatus = $QMBStatus;
    return $this;
  }
}
