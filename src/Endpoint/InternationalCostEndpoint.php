<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasDimension;
use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadHasCourier;

class InternationalCostEndpoint extends BaseEndpoint
{
    use PayloadHasDimension;
    use PayloadHasCourier;

    protected $cacheName = 'internationalCost';
    protected $endpoint = 'internationalCost';
    protected $apiVersion = 'v2';

    public function get()
    {
        // $this->httpClient->getCache()->clear();
        return $this->httpClient->request($this->endpoint);
    }

    public function find($id, $provinceID)
    {
        return $this->httpClient->request($this->endpoint, [
            'id' => $id,
            'province' => $provinceID
        ]);
    }

    /**
     * @param string $province
     * @return self
     */
    public function province($province)
    {
        $this->addPayload([
            'province' => $province
        ]);
        return $this;
    }
}
