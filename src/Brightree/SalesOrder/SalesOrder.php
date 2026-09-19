<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\BrightShip;
use Brightree\ApiMessageServices\LookupValue;
use Brightree\ApiMessageServices\PointOfDeliveryInfo;
use Brightree\Enums\QMBStatus;

class SalesOrder {
  public BrightShip $BrightShip;

  public ?int $BrightreeID = null;

  public SalesOrderDeliveryInfo $DeliveryInfo;

  public ?string $ExternalID = null;

  public ?LookupValue $MyFormsWorkflowStatus = null;

  public PointOfDeliveryInfo $PointOfDeliveryInfo;

  public QMBStatus|string|null $QMBStatus = null;

  public SalesOrderAuditInfo $SalesOrderAuditInfo;

  public SalesOrderAutoConfirmInfo $SalesOrderAutoConfirmInfo;

  public SalesOrderClinicalInfo $SalesOrderClinicalInfo;

  public SalesOrderGeneralInfo $SalesOrderGeneralInfo;

  public SalesOrderInsuranceInfo $SalesOrderInsuranceInfo;

  /** @var SalesOrderItemInfo[] */
  public array $SalesOrderItems = [];

  public SalesOrderMessages $SalesOrderMessages;

  /** @var SalesOrderPharmacyItemInfo[] */
  public array $SalesOrderPharmacyItems = [];

  public SalesOrderWIPInfo $SalesOrderWIPInfo;

  /** @var ShippingTrackingInfo[] */
  public array $ShippingTrackingInfos = [];

  public function __construct() {
    $this->BrightShip = new BrightShip();
    $this->DeliveryInfo = new SalesOrderDeliveryInfo();
    $this->PointOfDeliveryInfo = new PointOfDeliveryInfo();
    $this->SalesOrderAuditInfo = new SalesOrderAuditInfo();
    $this->SalesOrderAutoConfirmInfo = new SalesOrderAutoConfirmInfo();
    $this->SalesOrderClinicalInfo = new SalesOrderClinicalInfo();
    $this->SalesOrderGeneralInfo = new SalesOrderGeneralInfo();
    $this->SalesOrderInsuranceInfo = new SalesOrderInsuranceInfo();
    $this->SalesOrderMessages = new SalesOrderMessages();
    $this->SalesOrderWIPInfo = new SalesOrderWIPInfo();
  }

  public function getBrightShip(BrightShip $brightship): void {
    $this->BrightShip = $brightship;
  }

  public function setDeliveryInfo(SalesOrderDeliveryInfo $info): void {
    $this->DeliveryInfo = $info;
  }

  /**
   * @param SalesOrderItemInfo[] $items
   */
  public function setSalesOrderItems(array $items): self {
    $this->SalesOrderItems = $items;
    return $this;
  }

  public function addSalesOrderItem(SalesOrderItemInfo $item): self {
    $this->SalesOrderItems[] = $item;
    return $this;
  }

  /**
   * @param SalesOrderPharmacyItemInfo[] $items
   */
  public function setSalesOrderPharmacyItems(array $items): self {
    $this->SalesOrderPharmacyItems = $items;
    return $this;
  }

  public function addSalesOrderPharmacyItem(SalesOrderPharmacyItemInfo $item): self {
    $this->SalesOrderPharmacyItems[] = $item;
    return $this;
  }

  /**
   * @param ShippingTrackingInfo[] $infos
   */
  public function setShippingTrackingInfos(array $infos): self {
    $this->ShippingTrackingInfos = $infos;
    return $this;
  }

  public function addShippingTrackingInfo(ShippingTrackingInfo $info): self {
    $this->ShippingTrackingInfos[] = $info;
    return $this;
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

  public function setQMBStatus(QMBStatus|string|null $QMBStatus): self {
    $this->QMBStatus = $QMBStatus;
    return $this;
  }
}
