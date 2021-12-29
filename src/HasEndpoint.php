<?php

namespace Ngopibareng\RajaongkirLaravel;

use Illuminate\Support\Collection;

use Ngopibareng\RajaongkirLaravel\Endpoint\ProvinceEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\CityEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\SubdistrictEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\CurrencyEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\InternationalCostEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\InternationalDestinationEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\InternationalOriginEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\CostEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\WaybillEndpoint;

trait HasEndpoint {
    protected $endpoints = [
        [
            'endpoint' => 'province',
            'class' => ProvinceEndpoint::class
        ],
        [
            'endpoint' => 'city',
            'class' => CityEndpoint::class
        ],
        [
            'endpoint' => 'district',
            'class' => SubdistrictEndpoint::class
        ],
        [
            'endpoint' => 'internationalOrigin',
            'class' => InternationalOriginEndpoint::class
        ],
        [
            'endpoint' => 'internationalDestination',
            'class' => InternationalDestinationEndpoint::class
        ]
    ];

    public function endpoints()
    {
        return Collection::make($this->endpoints);
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
}
