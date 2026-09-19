<?php

namespace Brightree\Enums;

/**
 * Generated from the ItemSortFields type in InventoryService.wsdl.
 *
 * The WSDL declares this as a restricted string; the properties that use it accept either a case of this enum or a raw string.
 *
 * Regenerate with: php tools/generate-types.php
 */
enum ItemSortFields: string {
  case BrightreeID = 'BrightreeID';
  case ItemID = 'ItemID';
  case ItemName = 'ItemName';
  case Description = 'Description';
  case Lotted = 'Lotted';
  case KitItem = 'KitItem';
  case UPCBarCode = 'UPCBarCode';
  case ItemTypeKey = 'ItemTypeKey';
  case ItemType = 'ItemType';
  case ItemGroupKey = 'ItemGroupKey';
  case ItemGroup = 'ItemGroup';
  case SaleTypeKey = 'SaleTypeKey';
  case SaleType = 'SaleType';
  case GLAcctGrpKey = 'GLAcctGrpKey';
  case GLAcctGrp = 'GLAcctGrp';
  case ExternalID = 'ExternalID';
  case ItemStatusKey = 'ItemStatusKey';
  case Status = 'Status';
  case DepreciationTypeKey = 'DepreciationTypeKey';
  case DepreciationType = 'DepreciationType';
  case ProcCode = 'ProcCode';
  case ManufacturerKey = 'ManufacturerKey';
  case Manufacturer = 'Manufacturer';
  case ManufacturerItemId = 'ManufacturerItemId';
  case VendorKey = 'VendorKey';
  case Vendor = 'Vendor';
  case VendorItemID = 'VendorItemID';
  case VendorItemName = 'VendorItemName';
  case User1 = 'User1';
  case User2 = 'User2';
  case User3 = 'User3';
  case User4 = 'User4';
}
