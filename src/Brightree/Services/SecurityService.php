<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class SecurityService extends BaseService {
  public function __construct(array $params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2602/SecurityService/UserSecurityService.svc?singleWsdl";
  }

  public function userCreate(mixed $User = null): mixed {
    return $this->apiCall('UserCreate', [
      'User' => $User
    ]);
  }

  public function userFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('UserFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function userGroupBDMPermissionsFetchByUserGroupBrightreeID(?int $UserGroupBrightreeID = null): mixed {
    return $this->apiCall('UserGroupBDMPermissionsFetchByUserGroupBrightreeID', [
      'UserGroupBrightreeID' => $UserGroupBrightreeID
    ]);
  }

  public function userGroupBDMPermissionsUpdate(?int $UserGroupBrightreeID = null, mixed $userGroupBDMPermissions = null): mixed {
    return $this->apiCall('UserGroupBDMPermissionsUpdate', [
      'UserGroupBrightreeID' => $UserGroupBrightreeID,
      'userGroupBDMPermissions' => $userGroupBDMPermissions
    ]);
  }

  public function userGroupCreate(mixed $userGroup = null): mixed {
    return $this->apiCall('UserGroupCreate', [
      'userGroup' => $userGroup
    ]);
  }

  public function userGroupFetchByBrightreeID(?int $BrightreeID = null): mixed {
    return $this->apiCall('UserGroupFetchByBrightreeID', [
      'BrightreeID' => $BrightreeID
    ]);
  }

  public function userGroupPermissionsFetchByUserGroupBrightreeID(?int $UserGroupBrightreeID = null): mixed {
    return $this->apiCall('UserGroupPermissionsFetchByUserGroupBrightreeID', [
      'UserGroupBrightreeID' => $UserGroupBrightreeID
    ]);
  }

  public function userGroupPermissionsUpdate(?int $UserGroupBrightreeID = null, mixed $userGroupPermissions = null): mixed {
    return $this->apiCall('UserGroupPermissionsUpdate', [
      'UserGroupBrightreeID' => $UserGroupBrightreeID,
      'userGroupPermissions' => $userGroupPermissions
    ]);
  }

  public function userGroupUpdate(?int $BrightreeID = null, mixed $userGroup = null): mixed {
    return $this->apiCall('UserGroupUpdate', [
      'BrightreeID' => $BrightreeID,
      'userGroup' => $userGroup
    ]);
  }

  public function userSearch(mixed $searchRequest = null, ?array $sortRequest = null, ?int $pageSize = null, ?int $page = null): mixed {
    return $this->apiCall('UserSearch', [
      'searchRequest' => $searchRequest,
      'sortRequest' => $sortRequest,
      'pageSize' => $pageSize,
      'page' => $page
    ]);
  }

  public function userUpdate(?int $BrightreeID = null, mixed $User = null): mixed {
    return $this->apiCall('UserUpdate', [
      'BrightreeID' => $BrightreeID,
      'User' => $User
    ]);
  }

  public function ping(): mixed {
    return $this->apiCall('Ping', []);
  }

  public function userGroupFetchAll(): mixed {
    return $this->apiCall('UserGroupFetchAll', []);
  }
}
