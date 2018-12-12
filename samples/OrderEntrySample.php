<?php

require_once 'vendor/autoload.php';

use onenaturalway\Brightree\BrightreeClient;

$bt = new BrightreeClient("","");
var_dump($bt->orderEntryService()->createSalesOrder());
