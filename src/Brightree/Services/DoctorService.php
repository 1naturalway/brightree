<?php

namespace Brightree\Services;

use Brightree\Services\BaseService;

class DoctorService extends BaseService {
  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2008/DoctorService/DoctorService.svc?singleWsdl";
  }

  public function doctorCreate($doctor) {
    return $this->apiCall('DoctorCreate', ['Doctor' => $doctor]);
  }
}
