<?php

require_once 'vendor/autoload.php';

use Brightree\BrightreeClient;

$bt = new BrightreeClient(["username" => "", "password" => ""]);
echo json_encode($bt->orderEntryService()->createSalesOrder(), JSON_PRETTY_PRINT) . PHP_EOL;
