# Brightree PHP SDK

[![CI](https://github.com/1naturalway/brightree/actions/workflows/ci.yml/badge.svg)](https://github.com/1naturalway/brightree/actions/workflows/ci.yml)

A PHP client for the [Brightree](https://brightree.com) SOAP API. It wraps all
**357 operations** across Brightree's **12 web services** in typed methods, and
ships typed request objects for every input the API accepts, so you write
`$order->addSalesOrderItem($item)` instead of assembling `stdClass` graphs by
hand.

- [Requirements](#requirements)
- [Installation](#installation)
- [Quick start](#quick-start)
- [Laravel](#laravel)
- [Configuration](#configuration)
- [Building requests](#building-requests)
- [Reading responses](#reading-responses)
- [Updating a fetched record](#updating-a-fetched-record)
- [Error handling](#error-handling)
- [Services](#services)
- [Escape hatches](#escape-hatches)
- [Development](#development)

## Requirements

- PHP 8.4 or 8.5
- `ext-soap`
- Brightree API credentials

## Installation

```bash
composer require 1naturalway/brightree
```

## Quick start

```php
use Brightree\BrightreeClient;

$brightree = new BrightreeClient([
    'username' => getenv('BRIGHTREE_USERNAME'),
    'password' => getenv('BRIGHTREE_PASSWORD'),
]);

$response = $brightree->patientService()->patientFetchByBrightreeID(123456);
```

Creating a patient:

```php
use Brightree\Enums\Gender;
use Brightree\Enums\PatientCustomerType;
use Brightree\Patient\Patient;

$patient = new Patient();
$patient->PatientGeneralInfo->Name->First = 'Ada';
$patient->PatientGeneralInfo->Name->Last = 'Lovelace';
$patient->PatientGeneralInfo->BirthDate = '1815-12-10';
$patient->PatientGeneralInfo->CustomerType = PatientCustomerType::Patient;
$patient->PatientGeneralInfo->DeliveryAddress->AddressLine1 = '1 Analytical Way';
$patient->PatientGeneralInfo->DeliveryAddress->City = 'Dayton';
$patient->PatientGeneralInfo->DeliveryAddress->State = 'OH';
$patient->PatientGeneralInfo->DeliveryAddress->PostalCode = '45402';
$patient->PatientClinicalInfo->Gender = Gender::Female;

$response = $brightree->patientService()->patientCreate($patient);

if ($response->PatientCreateResult->Success) {
    $patientKey = $response->PatientCreateResult->UpdatedDataKey;
}
```

## Laravel

Auto-discovery registers the service provider and the `Brightree` facade. To
wire them up by hand instead, add to `config/app.php`:

```php
'providers' => [
    Brightree\FrameworkSupport\Laravel\BrightreeServiceProvider::class,
],

'aliases' => [
    'Brightree' => Brightree\FrameworkSupport\Laravel\BrightreeFacade::class,
],
```

Publish the config:

```bash
php artisan vendor:publish --provider="Brightree\FrameworkSupport\Laravel\BrightreeServiceProvider"
```

Set your credentials in `.env`:

```
BRIGHTREE_USERNAME=xxxxxxxx
BRIGHTREE_PASSWORD=xxxxxxxx
```

Then resolve the client from the container or the facade:

```php
$service = Brightree::salesOrderService();

$service = app('brightree')->salesOrderService();
```

## Configuration

`BrightreeClient` takes credentials plus two optional override arrays.

```php
$brightree = new BrightreeClient([
    'username' => '...',
    'password' => '...',

    // Merged over BrightreeClient::DEFAULT_SSL_OPTIONS
    'ssl' => [
        'verify_peer' => true,
        'verify_peer_name' => true,
        'allow_self_signed' => false,
    ],

    // Merged over BrightreeClient::DEFAULT_SOAP_OPTIONS
    'soap' => [
        'connection_timeout' => 30,
    ],
]);
```

> [!IMPORTANT]
> **TLS peer verification is off by default.** That is how this client has
> always talked to Brightree, and turning it on by default would change the
> behaviour of every existing installation. Enable it with the `ssl` options
> above — in Laravel, set `BRIGHTREE_VERIFY_PEER=true`.

WSDLs are cached to disk (`WSDL_CACHE_DISK`) and SoapClient instances are
reused per endpoint, so a WSDL is fetched once rather than on every call. Pass
`'soap' => ['cache_wsdl' => WSDL_CACHE_NONE]` while developing against a
changing WSDL; `soap.wsdl_cache_ttl` in `php.ini` controls how long a cached
copy lives.

## Building requests

### Nested objects are ready to use

Request objects build their children up front, so you can assign straight
through them without null checks:

```php
$order = new Brightree\SalesOrder\SalesOrder();
$order->SalesOrderClinicalInfo->Patient->AccountNumber = 'ACCT-9';
$order->DeliveryInfo->Address->City = 'Dayton';
```

### Only what you set is sent

Brightree's services are WCF endpoints, where an element carrying
`xsi:nil="true"` means *"set this field to null"* — which is not the same as
omitting it, which means *"leave this field alone"*. Untouched fields are
stripped from the request rather than transmitted as explicit nulls, so an
update cannot blank a field you never assigned.

Falsy values you *did* set — `false`, `0`, `''` — are always sent.

### Collections are plain arrays

```php
use Brightree\SalesOrder\SalesOrderItemInfo;

$pump = new SalesOrderItemInfo();
$pump->ItemID = 'PUMP-1';
$pump->Qty = 1;

$kit = new SalesOrderItemInfo();
$kit->ItemID = 'KIT-2';
$kit->Qty = 2;

$order->addSalesOrderItem($pump)->addSalesOrderItem($kit);

// equivalently
$order->SalesOrderItems = [$pump, $kit];
```

### Enums

Every restricted string in the schema has a backed enum under
`Brightree\Enums`. Properties accept either a case or a raw string, so
existing string code keeps working:

```php
use Brightree\Enums\PayorLevel;

$payor->payorLevel = PayorLevel::Primary;
$payor->payorLevel = 'Primary';           // also fine
```

### Request types

Operations that take a structured argument have a class for it under
`Brightree\Types`, named after the schema type. Each service method documents
the one it expects:

```php
use Brightree\Enums\SortOrder;
use Brightree\Types\ItemSearchRequest;
use Brightree\Types\ItemSortParameter;

$request = new ItemSearchRequest();
$request->ItemID = 'PUMP-1';

$sort = new ItemSortParameter();
$sort->SortOrder = SortOrder::Ascending;

$response = $brightree->inventoryService()->itemSearch($request, [$sort], 25, 1);
```

A handful of type names are declared differently by different services. Those
live in a per-service sub-namespace — `Brightree\Types\Inventory\...`,
`Brightree\Types\ReferenceData\...` — and are not interchangeable.

## Reading responses

Responses come back as `stdClass`, not as the request classes. Every operation
wraps its payload in a `{OperationName}Result` property:

```php
$response = $brightree->patientService()->patientCreate($patient);

$result = $response->PatientCreateResult;
$result->Success;          // bool
$result->UpdatedDataKey;   // the new record's Brightree ID
$result->Messages;         // validation and process messages
```

Brightree omits a collection entirely when it is empty and collapses it to a
single object when it holds one item, so guard before iterating:

```php
$payors = $result->Items->Patient->PatientInsuranceInfo->Payors->PatientPayorInfo ?? null;
$payors = $payors === null ? [] : (is_array($payors) ? $payors : [$payors]);
```

To skip that guard entirely — and to get typed objects back — hydrate the
response instead. See below.

## Updating a fetched record

The common Brightree workflow is fetch, change a couple of fields, send it
back. The update has to carry the fields nobody touched, so building the
request object from scratch is not an option. `ResponseHydrator` turns a
response node into the request DTO the operation expects:

```php
use Brightree\SalesOrder\SalesOrder;
use Brightree\Soap\ResponseHydrator;

$service = $brightree->salesOrderService();

$response = $service->salesOrderFetchByBrightreeID(555);
$order = ResponseHydrator::hydrate(SalesOrder::class, $response->SalesOrderFetchByBrightreeIDResult->Items->SalesOrder);

$item = $order->SalesOrderItems[0];
$item->ProcCode = 'A4253';
$item->ChargeAmt = 45.00;
$item->AllowAmt = 12.50;
$item->Qty = 3;

$service->salesOrderUpdateItem(555, $item->BrightreeDetailID, $item);
```

Use `hydrateMany()` when the node you are handed is the collection rather than
a single record:

```php
$orders = ResponseHydrator::hydrateMany(SalesOrder::class, $result->Items);
```

Everything is driven by the DTO's own declared property types, so there is no
classmap to register and nothing to keep in step with the WSDLs.

### Collections become plain lists

A repeating element comes back inside a wrapper object keyed by the repeated
element's name, and ext-soap collapses that to a single object rather than a
one-element array whenever the element occurs once. Hydration flattens all of
it, including the empty wrapper Brightree sends for an empty collection:

```php
// {"Payors": {"SalesOrderItemPayorInfo": [{...}, {...}]}}  ->  2 items
// {"Payors": {"SalesOrderItemPayorInfo": {...}}}           ->  1 item
// {"Payors": {}}                                           ->  0 items

foreach ($item->Payors as $payor) {   // no is_array() guard needed
    $payor->PayorKey;
}
```

Nesting is followed all the way down, so `SalesOrder` &rarr; `SalesOrderItems`
&rarr; `SalesOrderItemInfo` &rarr; `Payors` &rarr; `SalesOrderItemPayorInfo`
arrives as typed objects at every level.

Setting `'soap' => ['features' => SOAP_SINGLE_ELEMENT_ARRAYS]` makes ext-soap
keep one-element collections as lists at the source. It changes the shape of
every raw response, so it is off by default, and it does not remove the need
for hydration — an *empty* collection still arrives as a wrapper with no
children either way. Hydrated results are identical with it on or off.

### A field the response omits keeps its default

An absent property is left alone rather than set to null. That distinction is
the whole point: a null would be sent back as `xsi:nil`, which tells a WCF
endpoint to blank the field. A field the response returns *as* `xsi:nil` is
treated the same way — it is already null server-side, so there is nothing to
write back.

The upshot is that a hydrated DTO sent straight back reproduces the record it
came from, minus the nils. One caveat: the DTOs declare every `xs:decimal` as
`float`, so `12.50` is re-encoded as `12.5`. The value is unchanged.

### Anything that cannot be carried across is reported, not thrown

Brightree's response types are sometimes supersets of its request types, and a
service can gain an enum case between releases. Neither raises — an unrelated
field drifting must not fail a call that never touched it. Pass a third
argument to see what was dropped:

```php
$order = ResponseHydrator::hydrate(SalesOrder::class, $node, $skipped);

// $skipped === ['SalesOrder.SalesOrderItems[0].ServerOnlyField']
```

`$skipped` is an empty array when the whole node came across cleanly. Only
structural problems raise: a class that does not exist, or a graph nested more
than 64 levels deep.

## Error handling

Transport and encoding problems raise `SoapFault`. Business-level failures come
back on the response with `Success => false` and detail in `Messages`:

```php
try {
    $response = $brightree->salesOrderService()->salesOrderCreate($order);
} catch (SoapFault $e) {
    // network, auth, or malformed request
}

if (!$response->SalesOrderCreateResult->Success) {
    // rejected by Brightree; inspect ->Messages
}
```

## Services

| Accessor | Operations |
| --- | --- |
| `customFieldService()` | 3 |
| `doctorService()` | 17 |
| `documentManagementService()` | 11 |
| `insuranceService()` | 38 |
| `inventoryService()` | 40 |
| `patientBillingService()` | 8 |
| `patientService()` | 52 |
| `pickupExchangeService()` | 21 |
| `pricingService()` | 12 |
| `referenceDataService()` | 69 |
| `salesOrderService()` | 73 |
| `securityService()` | 13 |

## Escape hatches

### Calling an unwrapped operation

`BaseService` can talk to any endpoint directly:

```php
use Brightree\Services\BaseService;

$service = new BaseService($brightree->params());
$service->wsdl_path = 'https://webservices.brightree.net/v0100-2602/CustomFieldService/CustomFieldService.svc?singleWsdl';

$response = $service->custom('CustomFieldFetchAllByCategory', [
    'category' => 'Patient',
    'includeInactive' => false,
]);
```

### Sending an explicit null

To deliberately blank a field server-side, turn pruning off for that call. Be
aware this applies to the whole payload, so every unset field on it is sent as
an explicit null too:

```php
$service = $brightree->patientService();
$service->prune = false;
$service->patientUpdate($brightreeId, $patient);
```

## Development

```bash
composer install
composer test           # PHPUnit
vendor/bin/phpcs        # PSR-12, 2-space indent
```

### WSDLs

Brightree's WSDL files are **their proprietary material and are not part of
this repository**. You do not need them for normal use — the client talks to
the live endpoints.

You do need a local copy to run the contract tests or regenerate the types.
Put it in a `Brightree Services` directory at the project root, or point
`BRIGHTREE_WSDL_DIR` at wherever you keep it.

### Tests

The suite is in two tiers:

- **Tier A** runs on any checkout. It covers request pruning, client caching
  and the encoder's behaviour, using a small generic fixture WSDL written for
  this repository.
- **Tier B** needs Brightree's WSDLs and skips with an explanatory message
  without them. It holds the contract tests, which assert every wrapper's
  operation name, arguments and endpoint against the current schemas — that is
  what catches drift after a Brightree release — plus DTO field coverage,
  serialization regressions, and the fetch-edit-send round trip against
  Brightree's own collection shapes.

```bash
composer test                                        # Tier B skips
BRIGHTREE_WSDL_DIR=~/brightree-wsdls composer test   # everything runs
```

### Regenerating types

`src/Brightree/Types` and `src/Brightree/Enums` are generated from the WSDLs
and committed, so this only needs running when Brightree ships a new service
version:

```bash
BRIGHTREE_WSDL_DIR=~/brightree-wsdls php tools/generate-types.php
```

The generator reuses a hand-written class only when it matches the schema
field-for-field, and reports anything it declined to reuse. Run the contract
tests afterwards to confirm the wrappers still line up.

## License

GPL-3.0-or-later
