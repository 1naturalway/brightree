<?php

namespace Brightree\ApiMessageServices;

use Brightree\Enums\CustomFieldCategory;

class CustomFieldValue {
  public CustomFieldCategory|string|null $CustomFieldCategory = null;

  public ?int $FieldStorageNumber = null;

  public ?int $ObjectDataKey = null;

  public ?string $Value = null;
}
