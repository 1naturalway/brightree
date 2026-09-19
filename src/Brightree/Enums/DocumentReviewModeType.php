<?php

namespace Brightree\Enums;

/**
 * Generated from the DocumentReviewModeType type in DocumentManagementService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum DocumentReviewModeType: string {
  case NoReview = 'NoReview';
  case OneReview = 'OneReview';
  case TwoReviews = 'TwoReviews';
}
