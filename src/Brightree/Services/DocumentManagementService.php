<?php

namespace Brightree\Services;

use Brightree\DocumentManagement\DocumentBatch;
use Brightree\DocumentManagement\DocumentBatchSearchRequest;
use Brightree\DocumentManagement\DocumentProperty;
use Brightree\Services\BaseService;
use InvalidArgumentException;
use Brightree\Types\DocumentBatchSortParameter;
use Brightree\Types\DocumentReviewUpdateRequest;
use Brightree\Types\DocumentSearchRequest;
use Brightree\Types\DocumentSortParameter;

class DocumentManagementService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/DocumentationService/DocumentManagementService.svc?singleWsdl";
  }

  /**
   * @param DocumentBatch|null $Batch
   */
  public function documentBatchCreate(?DocumentBatch $Batch): mixed {
    return $this->apiCall('DocumentBatchCreate', ['batch' => $Batch]);
  }

  /**
   * @param DocumentBatchSearchRequest|null $searchRequest
   * @param DocumentBatchSortParameter[]|null $sortRequest
   */
  public function documentBatchSearch(?DocumentBatchSearchRequest $searchRequest, ?array $sortRequest, ?int $pageSize, ?int $page): mixed {
    return $this->apiCall('DocumentBatchSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function documentTypesFetchAll(): mixed {
    return $this->apiCall('DocumentTypesFetchAll', []);
  }

  public function generateDocumentID(?int $DocumentTypeBrightreeID, ?string $EntityType, ?int $EntityBrightreeID): mixed {
    return $this->apiCall('GenerateDocumentID', [
      'DocumentTypeBrightreeID' => $DocumentTypeBrightreeID,
      'EntityType' => $EntityType,
      'EntityBrightreeID' => $EntityBrightreeID
    ]);
  }

  /**
   * @param array<int, string>|DocumentProperty[]|null $PropertyBag Either
   *        [propertyKey => value] or a list of DocumentProperty.
   * @param string|null $Contents The document's RAW bytes. SoapClient
   *        base64-encodes it for the schema's base64Binary element, so do not
   *        encode it yourself or it will be stored double-encoded.
   */
  public function storeDocument(?int $BatchBrightreeID, ?int $DocumentTypeBrightreeID, ?array $PropertyBag, ?bool $SearchForBarCode, ?string $Contents): mixed {
    return $this->apiCall('StoreDocument', [
      'BatchBrightreeID' => $BatchBrightreeID,
      'DocumentTypeBrightreeID' => $DocumentTypeBrightreeID,
      'PropertyBag' => self::propertyBag($PropertyBag),
      'SearchForBarCode' => $SearchForBarCode,
      'Contents' => $Contents
    ]);
  }

  /**
   * @param array<int, string>|DocumentProperty[]|null $propertyBag Either
   *        [propertyKey => value] or a list of DocumentProperty.
   */
  public function documentPropertyUpdate(?int $documentKey = null, ?array $propertyBag = null): mixed {
    return $this->apiCall('DocumentPropertyUpdate', [
      'documentKey' => $documentKey,
      'propertyBag' => self::propertyBag($propertyBag)
    ]);
  }

  /**
   * Normalise a property bag into the list of key/value nodes the schema's
   * ArrayOfKeyValueOfintstring actually expects.
   *
   * Accepts the associative array callers reach for first, a list of
   * DocumentProperty, or a mix. Anything already shaped like a node is passed
   * through so hand-built payloads keep working.
   *
   * @param array<int|string, mixed>|null $propertyBag
   * @return DocumentProperty[]|null
   */
  public static function propertyBag(?array $propertyBag): ?array {
    if ($propertyBag === null) {
      return null;
    }

    $normalised = [];

    foreach ($propertyBag as $key => $value) {
      if ($value instanceof DocumentProperty) {
        $normalised[] = $value;
        continue;
      }

      // A hand-built {Key, Value} object or array: leave it as it is.
      if (is_object($value) || is_array($value)) {
        $normalised[] = $value;
        continue;
      }

      $normalised[] = new DocumentProperty((int) $key, $value === null ? null : (string) $value);
    }

    foreach ($normalised as $entry) {
      // Key is the one minOccurs="1", non-nillable element reachable from any
      // wrapped operation. Omitting it makes ext-soap throw "object has no
      // 'Key' property", which says nothing about which property bag entry.
      if ($entry instanceof DocumentProperty && $entry->Key === null) {
        throw new InvalidArgumentException(
            'A document property needs a Key: the schema marks it required, and a DocumentProperty '
            . 'with a null Key makes the SOAP encoder fail with an unhelpful message.'
        );
      }
    }

    return $normalised;
  }

  /**
   * @param DocumentReviewUpdateRequest|null $documentReviewUpdateRequest
   */
  public function documentReviewUpdate(?int $documentKey = null, mixed $documentReviewUpdateRequest = null): mixed {
    return $this->apiCall('DocumentReviewUpdate', [
      'documentKey' => $documentKey,
      'documentReviewUpdateRequest' => $documentReviewUpdateRequest
    ]);
  }

  /**
   * @param DocumentSearchRequest|null $searchRequest
   * @param DocumentSortParameter[]|null $sortRequest
   */
  public function documentSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('DocumentSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function fetchDocumentContent(?int $documentKey = null): mixed {
    return $this->apiCall('FetchDocumentContent', [
      'documentKey' => $documentKey
    ]);
  }

  /**
   * @param array<int, string>|DocumentProperty[]|null $PropertyBag Either
   *        [propertyKey => value] or a list of DocumentProperty.
   * @param string|null $Contents The document's RAW bytes; see storeDocument().
   */
  public function storeDocumentAndReturnInfo(?int $BatchBrightreeID = null, ?int $DocumentTypeBrightreeID = null, ?array $PropertyBag = null, ?bool $SearchForBarCode = null, ?string $Contents = null): mixed {
    return $this->apiCall('StoreDocumentAndReturnInfo', [
      'BatchBrightreeID' => $BatchBrightreeID,
      'DocumentTypeBrightreeID' => $DocumentTypeBrightreeID,
      'PropertyBag' => self::propertyBag($PropertyBag),
      'SearchForBarCode' => $SearchForBarCode,
      'Contents' => $Contents
    ]);
  }

  public function documentReviewReasonFetchAll(): mixed {
    return $this->apiCall('DocumentReviewReasonFetchAll', []);
  }
}
