<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;

class ProvinceEndpoint extends BaseEndpoint
{
    protected $cacheName = 'province';
    protected $endpoint = 'province';
    // protected $cacheForever = true;

    /**
     * Get all province
     *
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function get()
    {
        return $this->makeRequest();
    }

    /**
     * Find province by id
     *
     * @param string $id
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function find($id)
    {
        $this->addPayload([
            'id' => $id
        ]);
        return $this->makeRequest();
    }
}
