<?php

namespace Brightree\SalesOrder;

use Brightree\ApiMessageServices\BrightShip;
use Brightree\ApiMessageServices\PointOfDeliveryInfo;

class SalesOrder {
  public $BrightShip;
  public $BrightreeID;
  public $DeliveryInfo;
  public $ExternalID;
  public $MyFormsWorkflowStatus;
  public $PointOfDeliveryInfo;
  public $SalesOrderAudioInfo;
  public $CreatedDate;
  public $SalesOrderType;
  public $SalesOrderAutoConfirmInfo;
  public $SalesOrderClinicalInfo;
  public $SalesOrderGeneralInfo;
  public $SalesOrderInsuranceInfo;
  public $SalesOrderItems;
  public $SalesOrderMessages;
  public $SalesOrderWIPInfo;
  public $ShippingTrackingInfos;

  public function __construct() {
    $this->BrightShip = new BrightShip();
    $this->DeliveryInfo = new DeliveryInfo();
    $this->PointOfDeliveryInfo = new PointOfDeliveryInfo();
    $this->SalesOrderAudioInfo = new SalesOrderAuditInfo();
    $this->SalesOrderAutoConfirmInfo = new SalesOrderAutoConfirmInfo();
    $this->SalesOrderClinicalInfo = new SalesOrderClinicalInfo();
    $this->SalesOrderGeneralInfo = new SalesOrderGeneralInfo();
    $this->SalesOrderInsuranceInfo = new SalesOrderInsuranceInfo();
    $this->SalesOrderMessages = new SalesOrderMessages();
    $this->SalesOrderWIPInfo = new SalesOrderWIPInfo();
    $this->SalesOrderItems = new SalesOrderItems();
    $this->ShippingTrackingInfos = new ShippingTrackingInfo();
  }

  public function getBrightShip(BrightShip $brightship) {
    $this->BrightShip = $brightship;
  }
  public function setDeliveryInfo(DeliveryInfo $info) {
    $this->DeliveryInfo = $info;
  }

  public function getPointOfDeliveryInfo(PointOfDeliveryInfo $pointOfDeliveryInfo) {
    $this->PointOfDeliveryInfo = $pointOfDeliveryInfo;
  }

  public function getSalesOrderAudioInfo(SalesOrderAudioInfov $salesOrderAudioInfo) {
    $this->SalesOrderAudioInfo = $salesOrderAudioInfo;
  }

  public function getSalesOrderAutoConfirmInfo(SalesOrderAutoConfirmInfo $salesOrderAutoConfirmInfo) {
    $this->SalesOrderAutoConfirmInfo = $salesOrderAutoConfirmInfo;
  }

  public function getSalesOrderClinicalInfo(SalesOrderClinicalInfo $salesOrderClinicalInfo) {
    $this->SalesOrderClinicalInfo = $salesOrderClinicalInfo;
  }

  public function getSalesOrderGeneralInfo(SalesOrderGeneralInfo $salesOrderGeneralInfo) {
    $this->SalesOrderGeneralInfo = $salesOrderGeneralInfo;
  }

  public function getSalesOrderInsuranceInfo(SalesOrderInsuranceInfo $salesOrderInsuranceInfo) {
    $this->SalesOrderInsuranceInfo = $salesOrderInsuranceInfo;
  }

  public function getSalesOrderMessages(SalesOrderMessages $salesOrderMessages) {
    $this->SalesOrderMessages = $salesOrderMessages;
  }

  public function getSalesOrderWIPInfo(SalesOrderWIPInfo $salesOrderWIPInfo) {
    $this->SalesOrderWIPInfo = $salesOrderWIPInfo;
  }


  public function setBrightreeID($BrightreeID) {
    $this->BrightreeID = $BrightreeID;
    return $this;
  }

  public function setExternalID($ExternalID) {
    $this->ExternalID = $ExternalID;
    return $this;
  }

  public function setPointOfDeliveryInfo($PointOfDeliveryInfo) {
    $this->PointOfDeliveryInfo = $PointOfDeliveryInfo;
    return $this;
  }
}
