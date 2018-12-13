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

```
 $service = Brightree::orderEntryService();

 $service = app('brightree)->orderEntryService();
```
