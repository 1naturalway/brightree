<?php

namespace Brightree\Services;

class DoctorService {

  use \Brightree\Traits\ApiTrait;
  use \Brightree\Traits\CustomTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-2008/DoctorService/DoctorService.svc?singleWsdl";
  }

  public function DoctorCreate($doctor) {
    return $this->ApiCall('DoctorCreate', ['Doctor' => $doctor]);
  }
}
