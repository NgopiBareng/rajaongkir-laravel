<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;

class ProvinceEndpoint extends BaseEndpoint
{
    protected $cacheName = 'province';
    protected $endpoint = 'province';
    // protected $disableCache = fals;
    // protected $cacheForever = true;

    /**
     * Get all province
     *
     * @return self
     */
    public function get()
    {
        $this->makeRequest();
        return $this;
    }

    /**
     * Find province by id
     *
     * @param string $id
     * @return self
     */
    public function find($id)
    {
        $this->addPayload([
            'id' => $id
        ]);
        $this->makeRequest();
        return $this;
    }
}
