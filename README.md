# Brightree PHP SDK

## Install

Using the composer CLI:

```
composer require 1naturalway/brightree
```

Or manually add it to your composer.json:

``` json
{
  "require": {
    "1naturalway/brightree": "dev-master",
  }
}
```

## Laravel 5.1 Service Provider

In config/app.php, register the service provider

```
Brightree\FrameworkSupport\Laravel\BrightreeServiceProvider::class,
```

Register the Facade (optional)

```
'Brightree' => Brightree\FrameworkSupport\Laravel\BrightreeFacade::class
```

Publish the config

```
php artisan vendor:publish --provider="Brightree\FrameworkSupport\Laravel\BrightreeServiceProvider"
```

Set your env variables

```
BRIGHTREE_USERNAME=xxxxxxxx
BRIGHTREE_PASSWORD=xxxxxxxx
```

Access Brightree SDK from the Facade or Binding

```php
$service = Brightree::salesOrderService();

$service = app('brightree')->salesOrderService();
```

## Processing a Customer

1) Create Patient
2) Add Insurance to Patient
3) Create Sales Order
4) Add Items to Sales Order

```php
$order = new Brightree\SalesOrder\SalesOrder();
$order->SalesOrderClinicalInfo->Patient->AccountNumber = $accountNumber;

$pump = new Brightree\SalesOrder\SalesOrderItemInfo();
$pump->ItemID = 'PUMP-1';
$pump->Qty = 1;

$order->addSalesOrderItem($pump);

$response = Brightree::salesOrderService()->salesOrderCreate($order);
```

Only the fields you set are sent. The DTOs build their nested objects up front
so you can assign straight through them, and anything left untouched is
stripped from the request rather than transmitted as an explicit null — which
Brightree would read as "clear this field". Set `$service->prune = false` on a
call that really does need to blank something server-side.

## WSDLs

Brightree's WSDL files are their proprietary material and are **not** part of
this repository. The library talks to the live endpoints, so you do not need
them for normal use.

You do need a local copy to regenerate the types in `src/Brightree/Types` and
`src/Brightree/Enums`, or to run the test suite's contract tests. Put it in a
`Brightree Services` directory at the project root, or point
`BRIGHTREE_WSDL_DIR` at wherever you keep it:

```
BRIGHTREE_WSDL_DIR=~/brightree-wsdls php tools/generate-types.php
```

The generated output is committed, so this only needs running when Brightree
ships a new service version.

## Tests

```
composer test
```

Tests that need the WSDLs skip with an explanatory message when they are
absent, so the suite passes on a plain checkout. Supply the WSDLs as above to
run the contract tests, which check every wrapper's operation name, arguments
and endpoint against the current schemas — that is what catches drift after a
Brightree release.
