<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasDimension;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasCourier;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasLocation;

use Ngopibareng\RajaongkirLaravel\Responses\InternationalCostResponse;

class InternationalCostEndpoint extends BaseEndpoint
{
    use PayloadHasDimension;
    use PayloadHasCourier;
    use PayloadHasLocation;

    protected $cacheName = 'internationalCost';
    protected $endpoint = 'internationalCost';
    protected $apiVersion = 'v2';
    protected $disableCache = true;

    public function responseClass()
    {
        return InternationalCostResponse::class;
    }

    /**
     * @param int $weight
     * @return self
     */
    public function weight(int $weight)
    {
        $this->addPayload([
            'weight' => $weight
        ]);
        return $this;
    }

    /**
     * @param array $payloads
     * @return self
     */
    public function get($payloads = [])
    {
        $this->addPayload($payloads);
        $this->makeRequest('POST');
        return $this;
    }
}
