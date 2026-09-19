<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;
use Brightree\Types\BranchOfficeInsurance;
use Brightree\Types\CommercialEligibilityPayerSearchRequest;
use Brightree\Types\CommercialEligibilityPayerSortParameter;
use Brightree\Types\CommercialPayerSearchRequest;
use Brightree\Types\CommercialPayerSortParameter;
use Brightree\Types\Insurance;
use Brightree\Types\InsuranceCarrierCode;
use Brightree\Types\InsuranceSearchRequest;
use Brightree\Types\InsuranceSortParameter;
use Brightree\Types\InsuranceSpanDateHoldInclusion;
use Brightree\Types\InsuranceSpanDateOverride;
use Brightree\Types\PriceTableSearchRequest;
use Brightree\Types\PriceTableSortParameter;
use Brightree\Types\PriceTableUpdateRequest;
use Brightree\Types\SpanDateSplit;

class InsuranceService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/OrderEntryService/InsuranceService.svc?singleWsdl";
  }

  public function branchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID(?int $BranchBrightreeID = null, ?int $InsuranceBrightreeID = null): mixed {
    return $this->apiCall('BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID', [
      'BranchBrightreeID' => $BranchBrightreeID,
      'InsuranceBrightreeID' => $InsuranceBrightreeID
    ]);
  }

  /**
   * @param BranchOfficeInsurance|null $InputObj
   */
  public function branchOfficeInsuranceUpdate(?int $BrightreeID = null, mixed $InputObj = null): mixed {
    return $this->apiCall('BranchOfficeInsuranceUpdate', [
      'BrightreeID' => $BrightreeID,
      'InputObj' => $InputObj
    ]);
  }

  /**
   * @param CommercialEligibilityPayerSearchRequest|null $searchParams
   * @param CommercialEligibilityPayerSortParameter[]|null $sortParams
   */
  public function commercialEligibilityPayerSearch(mixed $searchParams = null, ?array $sortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('CommercialEligibilityPayerSearch', [
      'searchParams' => $searchParams,
      'sortParams' => $sortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  /**
   * @param CommercialPayerSearchRequest|null $searchParams
   * @param CommercialPayerSortParameter[]|null $sortParams
   */
  public function commercialPayerSearch(mixed $searchParams = null, ?array $sortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('CommercialPayerSearch', [
      'searchParams' => $searchParams,
      'sortParams' => $sortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function fetchPmtSubTypeByPmtTypeBrightreeID(?int $PaymentTypeBrightreeID = null): mixed {
    return $this->apiCall('FetchPmtSubTypeByPmtTypeBrightreeID', [
      'PaymentTypeBrightreeID' => $PaymentTypeBrightreeID
    ]);
  }

  /**
   * @param InsuranceCarrierCode|null $InsCarrierCode
   */
  public function insuranceCarrierCodeCreate(mixed $InsCarrierCode = null): mixed {
    return $this->apiCall('InsuranceCarrierCodeCreate', [
      'InsCarrierCode' => $InsCarrierCode
    ]);
  }

  public function insuranceCarrierCodeDelete(?int $BrightreeID = null): mixed {
    return $this->apiCall('InsuranceCarrierCodeDelete', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  /**
   * @param InsuranceCarrierCode|null $InsCarrierCode
   */
  public function insuranceCarrierCodeUpdate(?int $InsCarrierCodeBrightreeID = null, mixed $InsCarrierCode = null): mixed {
    return $this->apiCall('InsuranceCarrierCodeUpdate', [
      'InsCarrierCodeBrightreeID' => $InsCarrierCodeBrightreeID,
      'InsCarrierCode' => $InsCarrierCode
    ]);
  }

  /**
   * @param Insurance|null $Insurance
   */
  public function insuranceCreate(mixed $Insurance = null): mixed {
    return $this->apiCall('InsuranceCreate', [
      'Insurance' => $Insurance
    ]);
  }

  public function insuranceFetchByBrightreeID(?string $BrightreeID = null): mixed {
    return $this->apiCall('InsuranceFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function insuranceFetchByExternalID(?string $ExternalID = null): mixed {
    return $this->apiCall('InsuranceFetchByExternalID', [
      'ExternalID' => $ExternalID
    ]);
  }

  /**
   * @param InsuranceSearchRequest|null $searchRequest
   * @param InsuranceSortParameter[]|null $sortRequest
   */
  public function insuranceSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('InsuranceSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  /**
   * @param InsuranceSpanDateHoldInclusion|null $InsSpanDateHoldInclusion
   */
  public function insuranceSpanDateHoldInclusionCreate(mixed $InsSpanDateHoldInclusion = null): mixed {
    return $this->apiCall('InsuranceSpanDateHoldInclusionCreate', [
      'InsSpanDateHoldInclusion' => $InsSpanDateHoldInclusion
    ]);
  }

  public function insuranceSpanDateHoldInclusionDelete(?int $BrightreeID = null): mixed {
    return $this->apiCall('InsuranceSpanDateHoldInclusionDelete', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  /**
   * @param InsuranceSpanDateOverride|null $inputObj
   */
  public function insuranceSpanDateOverrideCreate(mixed $inputObj = null): mixed {
    return $this->apiCall('InsuranceSpanDateOverrideCreate', [
      'inputObj' => $inputObj
    ]);
  }

  public function insuranceSpanDateOverrideDelete(?int $BrightreeID = null): mixed {
    return $this->apiCall('InsuranceSpanDateOverrideDelete', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  /**
   * @param InsuranceSpanDateOverride|null $inputObj
   */
  public function insuranceSpanDateOverrideUpdate(?int $BrightreeID = null, mixed $inputObj = null): mixed {
    return $this->apiCall('InsuranceSpanDateOverrideUpdate', [
      'BrightreeID' => $BrightreeID,
      'inputObj' => $inputObj
    ]);
  }

  /**
   * @param Insurance|null $Insurance
   */
  public function insuranceUpdate(?int $BrightreeID = null, mixed $Insurance = null): mixed {
    return $this->apiCall('InsuranceUpdate', [
      'BrightreeID' => $BrightreeID,
      'Insurance' => $Insurance
    ]);
  }

  public function insuranceValidationRuleSetCreate(?int $InsuranceBrightreeID = null, ?int $ValidationRuleSetBrightreeID = null): mixed {
    return $this->apiCall('InsuranceValidationRuleSetCreate', [
      'InsuranceBrightreeID' => $InsuranceBrightreeID,
      'ValidationRuleSetBrightreeID' => $ValidationRuleSetBrightreeID
    ]);
  }

  public function insuranceValidationRuleSetDelete(?int $InsuranceBrightreeID = null, ?int $ValidationRuleSetBrightreeID = null): mixed {
    return $this->apiCall('InsuranceValidationRuleSetDelete', [
      'InsuranceBrightreeID' => $InsuranceBrightreeID,
      'ValidationRuleSetBrightreeID' => $ValidationRuleSetBrightreeID
    ]);
  }

  public function itemGroupFetchByInsuranceBrightreeID(?int $InsuranceBrightreeID = null): mixed {
    return $this->apiCall('ItemGroupFetchByInsuranceBrightreeID', [
      'InsuranceBrightreeID' => $InsuranceBrightreeID
    ]);
  }

  public function priceTableFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('PriceTableFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  /**
   * @param PriceTableSearchRequest|null $searchParams
   * @param PriceTableSortParameter[]|null $sortParams
   */
  public function priceTableSearch(mixed $searchParams = null, ?array $sortParams = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('PriceTableSearch', [
      'searchParams' => $searchParams,
      'sortParams' => $sortParams,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  /**
   * @param PriceTableUpdateRequest|null $PriceTable
   */
  public function priceTableUpdate(?int $BrightreeID = null, mixed $PriceTable = null): mixed {
    return $this->apiCall('PriceTableUpdate', [
      'BrightreeID' => $BrightreeID,
      'PriceTable' => $PriceTable
    ]);
  }

  /**
   * @param SpanDateSplit|null $SpanDateSplitObj
   */
  public function spanDateSplit(mixed $SpanDateSplitObj = null): mixed {
    return $this->apiCall('SpanDateSplit', [
      'SpanDateSplitObj' => $SpanDateSplitObj
    ]);
  }

  public function bundleBillingRuleSetFetchAll(): mixed {
    return $this->apiCall('BundleBillingRuleSetFetchAll', []);
  }

  public function claimFormFetchAll(): mixed {
    return $this->apiCall('ClaimFormFetchAll', []);
  }

  public function coverageLimitFetchAll(): mixed {
    return $this->apiCall('CoverageLimitFetchAll', []);
  }

  public function customAppealFormFetchAll(): mixed {
    return $this->apiCall('CustomAppealFormFetchAll', []);
  }

  public function insuranceCompanyFetchAll(): mixed {
    return $this->apiCall('InsuranceCompanyFetchAll', []);
  }

  public function insuranceGroupFetchAll(): mixed {
    return $this->apiCall('InsuranceGroupFetchAll', []);
  }

  public function insurancePlanTypeFetchAll(): mixed {
    return $this->apiCall('InsurancePlanTypeFetchAll', []);
  }

  public function insurancePrintedFormsClaimFieldsFetch(): mixed {
    return $this->apiCall('InsurancePrintedFormsClaimFieldsFetch', []);
  }

  public function insurancePrintedFormsPARFieldsFetch(): mixed {
    return $this->apiCall('InsurancePrintedFormsPARFieldsFetch', []);
  }

  public function itemGroupFetchAll(): mixed {
    return $this->apiCall('ItemGroupFetchAll', []);
  }

  public function pARFormFetchAll(): mixed {
    return $this->apiCall('PARFormFetchAll', []);
  }

  public function ping(): mixed {
    return $this->apiCall('Ping', []);
  }

  public function supplyAllowanceRuleSetFetchAll(): mixed {
    return $this->apiCall('SupplyAllowanceRuleSetFetchAll', []);
  }
}
