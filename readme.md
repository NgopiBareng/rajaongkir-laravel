# RajaongkirLaravel

Raja Ongkir API 

## Installation

Via Composer

``` bash
$ composer require ngopibareng/rajaongkir-laravel
```

Publish config : 
```php
php artisan vendor:publish
```

Setting .env code :
```
RAJAONGKIR_API_KEY=YOUR_API_KEY
RAJAONGKIR_ACCOUNT_TYPE=starter/basic/pro

# Cache every request
RAJAONGKIR_CACHE_ENABLED=true
RAJAONGKIR_CACHE_DRIVER=file/redis
```

## Requirements
* PHP >= 7.3
* Laravel >= 7

## Usage
### General Usage
#### Get All Couriers
Get all couriers :
```php
use RajaongkirLaravel as RajaOngkir;

$couriers = RajaOngkir::courier()->all();
```
#### Get Supported Couriers For Shipping Cost
Get supported couriers for shipping cost
```php
use RajaongkirLaravel as RajaOngkir;

$couriers = RajaOngkir::courier()->getSupported();
```
#### Get international couriers
```php
use RajaongkirLaravel as RajaOngkir;

$couriers = RajaOngkir::courier()->getInternationalCouriers();
```
#### Get domestic couriers
```php
use RajaongkirLaravel as RajaOngkir;

$couriers = RajaOngkir::courier()->getDomesticCouriers();
```
### Province
#### Get All Provinces
Get all provinces :
```php
use RajaongkirLaravel as RajaOngkir;

$provinces = RajaOngkir::province()->get();
$response = $province->response()->toArray();
```

#### Get Province By ID
Get province by province id
```php
use RajaongkirLaravel as RajaOngkir;

$province = RajaOngkir::province()->find(11);
$response = $province->response()->toArray();
```

### City
#### Get All Cities
Get all cities :
```php
use RajaongkirLaravel as RajaOngkir;

$cities = RajaOngkir::city()->get();
$response = $cities->response()->toArray();
```

#### Get City By Parameters
Get city by parameters
```php
use RajaongkirLaravel as RajaOngkir;

$cities = RajaOngkir::city();
$cities = $cities->whereCityID(11)->get(); //by city_id
$cities = $cities->province(11)->get(); //by province_id
```

### District
#### Get Districts
Get districts by parameters :
```php
use RajaongkirLaravel as RajaOngkir;

$city_id = 11;
$districts = RajaOngkir::district()->get($city_id); // by city_id
$districts = $districts->whereID()->get(); //by district_id

$response = $districts->response()->toArray();
```

### International
#### Get International Origin
Get international origin by parameters :
```php
use RajaongkirLaravel as RajaOngkir;

$internationals = RajaOngkir::internationalOrigin()->get(); // all
$internationals = $internationals->city(11)->get(); //by city_id
$internationals = $internationals->province(11)->get(); //by province_id

$response = $internationals->response()->toArray();
```
#### Get International Destination
Get international destination by parameters :
```php
use RajaongkirLaravel as RajaOngkir;

$internationals = RajaOngkir::internationalDestination()->get(); // all
$internationals = $internationals->country(11)->get(); //by country_id
```
#### Get International Cost
Get international cost by parameters :
```php
use RajaongkirLaravel as RajaOngkir;

$parameters = [
    'origin'        => 155,     // origin city_id 
    'destination'   => 80,      // destination city_id
    'weight'        => 1300,    // weight
    'courier'       => 'jne'    // courier code
];
$internationals = RajaOngkir::internationalCost()->get($parameters);
$response = $internationals->response()->toArray();
```

### Currency
#### Get Currency
Get latest conversion currency (Dollar & Rupiah)
```php
use RajaongkirLaravel as RajaOngkir;

$currency = RajaOngkir::currency()->get();
$response = $currency->response()->toArray();
```

### Shipping Cost
#### Get Shipping cost by parameters
Get shipping cost by parameters :
```php
use RajaongkirLaravel as RajaOngkir;

$parameters = [
    'origin'        => 155,     // origin city_id 
    'originType'	=> 'city',
    'destination'   => 444,      // destination city_id
    'destinationType'=> 'city',
    'weight'        => 1300,    // weight
    'courier'       => 'jne'    // courier code
];
$costs = RajaOngkir::cost()->get($parameters);
$response = $costs->response()->toArray();
```

### Waybill / Track Shipping
#### Get waybill by parameters
Get waybill by parameters :
```php
use RajaongkirLaravel as RajaOngkir;

$trackingCode = '';
$courierCode = 'jne';
$waybills = RajaOngkir::waybill()->find($trackingCode, $courierCode);
$response = $waybills->response()->toArray();
```

### Caching
#### Pre-Cache
Pre Cache rajaongkir request
```php
# Avaiable cache : province, city, subdistrict, internationalDestination, internationalOrigin

# Pre-cache all raja ongkir request
php artisan rajaongkir:cache

# Pre-cache selected request raja ongkir 
php artisan rajaongkir:cache province
```
#### Remove caches
Remove cache
```php
# Avaiable cache : province, city, subdistrict, internationalDestination, internationalOrigin

# Remove all raja ongkir caches 
php artisan rajaongkir:cache-clear

# Remove selected raja ongkir cache 
php artisan rajaongkir:cache-clear province
```

### Widget
#### Widget Iframe 
```php
use RajaongkirLaravel as RajaOngkir;

$widget = RajaOngkir::widget();
$widget = $widget->setID('widget-rajaongkir'); //set selector id
$widget = $widget->build($theme = 'light');
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Credits

- [BEEP][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ngopibareng/rajaongkir-laravel.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ngopibareng/rajaongkir-laravel.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ngopibareng/rajaongkir-laravel/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/ngopibareng/rajaongkir-laravel
[link-downloads]: https://packagist.org/packages/ngopibareng/rajaongkir-laravel
[link-travis]: https://travis-ci.org/ngopibareng/rajaongkir-laravel
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/ngopibareng
[link-contributors]: ../../contributors
