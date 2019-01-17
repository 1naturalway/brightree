<?php

require_once 'vendor/autoload.php';

use Brightree\BrightreeClient;

$bt = new BrightreeClient(["username" => "", "password" => ""]);

$SalesOrderInsuranceInfo = new Brightree\SalesOrder\SalesOrderInsuranceInfo();
$SalesOrderInsuranceInfo->CoverageVerified = true;
$response = $bt->SalesOrderService()->SalesOrderUpdateInsurance(85, $SalesOrderInsuranceInfo);
echo json_encode($response, JSON_PRETTY_PRINT) . PHP_EOL;
