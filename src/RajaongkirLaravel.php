<?php

namespace Ngopibareng\RajaongkirLaravel;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

use Ngopibareng\RajaongkirLaravel\HttpClients\GuzzleClient as HTTPClient;
use Ngopibareng\RajaongkirLaravel\Courier;
use Ngopibareng\RajaongkirLaravel\Endpoint\ProvinceEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\CityEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\SubdistrictEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\CurrencyEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\InternationalCostEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\InternationalDestinationEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\InternationalOriginEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\CostEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\WaybillEndpoint;
use Ngopibareng\RajaongkirLaravel\Widget;

class RajaongkirLaravel
{
    /** @var \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient */
    protected $httpClient;

    /** @var string */
    protected $accountType;

    /** @var array */
    protected $baseUrl = [
        'starter' => 'https://api.rajaongkir.com/starter/',
        'basic' => 'https://api.rajaongkir.com/basic/',
        'pro' => 'https://pro.rajaongkir.com/api/'
    ];

    /**
     * @return void
     */
    public function __construct()
    {
        $this->accountType = config('rajaongkir.account_type');
        $baseUrl = Arr::get($this->baseUrl, $this->accountType);
        $httpClient = HTTPClient::make($baseUrl, config('rajaongkir.api_key'));

        $httpClient->getCache()->cache(config('rajaongkir.cache.enabled'));
        $this->setHTTPClient($httpClient);
    }

    /**
     * @return self
     */
    public static function make()
    {
        return (new self());
    }

    /**
     * Log Error
     *
     * @param \Throwable $th
     *
     * @return void
     **/
    protected function logError(\Throwable $th)
    {
        Log::error($th->getMessage(), ['trace' => $th->getTraceAsString()]);
    }

    /**
     * @param \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient $httpClient
     * @return self
     */
    public function setHTTPClient($httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function httpClient()
    {
        return $this->httpClient;
    }

    /**
     * Get supported couriers
     *
     * @return \Ngopibareng\RajaongkirLaravel\Courier
     */
    public function courier()
    {
        return Courier::make($this->accountType);
    }

    /**
     * Make request to get province
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\ProvinceEndpoint
     */
    public function province()
    {
        return ProvinceEndpoint::make($this->httpClient);
    }

    /**
     * Make request to get city
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\CityEndpoint
     */
    public function city()
    {
        return CityEndpoint::make($this->httpClient);
    }

    /**
     * Make request to get district
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\SubdistrictEndpoint
     */
    public function district()
    {
        return SubdistrictEndpoint::make($this->httpClient);
    }

    /**
     * Make request to get latest conversion currency
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\CurrencyEndpoint
     */
    public function currency()
    {
        return CurrencyEndpoint::make($this->httpClient);
    }

    /**
     * Make request to get international cost
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\InternationalCostEndpoint
     */
    public function internationalCost()
    {
        return InternationalCostEndpoint::make($this->httpClient);
    }

    /**
     * Make request to get international destination
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\InternationalDestinationEndpoint
     */
    public function internationalDestination()
    {
        return InternationalDestinationEndpoint::make($this->httpClient);
    }

    /**
     * Make request to get international origin
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\InternationalOriginEndpoint
     */
    public function internationalOrigin()
    {
        return InternationalOriginEndpoint::make($this->httpClient);
    }

    /**
     * Make request to get shipping cost
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\CostEndpoint
     */
    public function cost()
    {
        return CostEndpoint::make($this->httpClient);
    }

    /**
     * Make request to get waybill, tracking manifest (no resi)
     *
     * @return \Ngopibareng\RajaongkirLaravel\Endpoint\WaybillEndpoint
     */
    public function waybill()
    {
        return WaybillEndpoint::make($this->httpClient);
    }

    /**
     * @return string
     */
    public function accountType()
    {
        return $this->accountType;
    }

    /**
     * Build widget raja ongkir (iframe)
     *
     * @return \Ngopibareng\RajaongkirLaravel\Widget
     */
    public function widget()
    {
        return Widget::make();
    }
}
