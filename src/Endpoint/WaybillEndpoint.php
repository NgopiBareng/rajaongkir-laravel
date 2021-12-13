<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasCourier;

class WaybillEndpoint extends BaseEndpoint
{
    use PayloadHasCourier;

    protected $cacheName = 'waybill';
    protected $endpoint = 'waybill';
    protected $disableCache = true;

    /**
     * @param string @waybill. Waybill / No Resi
     * @param string @courier. Courier code
     */
    public function find($waybill, $courier)
    {
        $this->addPayload([
            'waybill' => $waybill,
            'courier' => $courier
        ]);
        return $this->makeRequest('POST');
    }
}
