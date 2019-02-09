<?php

namespace Brightree\Services;


class DoctorService {

  use \Brightree\Traits\ApiTrait;

  public function __construct($params) {
    $this->params = $params;
    $this->wsdl_path = "https://webservices.brightree.net/v0100-1610/DoctorService/DoctorService.svc?singleWsdl";
  }

  public function DoctorCreate($doctor) {
    return $this->ApiCall('DoctorCreate', ['Doctor' => $doctor]);
  }
}
