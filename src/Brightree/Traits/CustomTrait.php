<?php

namespace Brightree\Traits;

trait CustomTrait {
    use \Brightree\Traits\ApiTrait;

    public function Custom($service, $object)
    {
        return $this->ApiCall($service, $object);
    }
}