<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasCourier;
use Ngopibareng\RajaongkirLaravel\Responses\WaybillResponse;

class WaybillEndpoint extends BaseEndpoint
{
    use PayloadHasCourier;

    protected $cacheName = 'waybill';
    protected $endpoint = 'waybill';
    protected $disableCache = true;

    public function responseClass()
    {
        return WaybillResponse::class;
    }

    /**
     * Find waybill / tracking
     *
     * @param string $waybill. Waybill / No Resi
     * @param string $courier. Courier code
     * @return self
     */
    public function find($waybill, $courier)
    {
        $this->addPayload([
            'waybill' => $waybill,
            'courier' => $courier
        ]);
        $this->makeRequest('POST');
        return $this;
    }
}
