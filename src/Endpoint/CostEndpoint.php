<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasDimension;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasCourier;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasLocation;
use Ngopibareng\RajaongkirLaravel\Responses\CostResponse;

class CostEndpoint extends BaseEndpoint
{
    use PayloadHasDimension;
    use PayloadHasCourier;
    use PayloadHasLocation;

    protected $cacheName = 'cost';
    protected $endpoint = 'cost';
    protected $disableCache = true;

    public function responseClass()
    {
        return CostResponse::class;
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
     * @param int $diameter
     * @return self
     */
    public function diameter(int $diameter)
    {
        $this->addPayload([
            'diameter' => $diameter
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
