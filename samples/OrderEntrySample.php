<?php

require_once 'vendor/autoload.php';

use Brightree\BrightreeClient;

$bt = new BrightreeClient(["username" => "", "password" => ""]);

$response = $bt->PatientService()->PatientFetchbyBrightreeID(4);
echo json_encode($response, JSON_PRETTY_PRINT) . PHP_EOL;
