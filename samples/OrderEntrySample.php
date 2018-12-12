<?php

require_once 'vendor/autoload.php';

use Brightree\BrightreeClient;

$bt = new BrightreeClient("","");
var_dump($bt->orderEntryService()->createSalesOrder());
