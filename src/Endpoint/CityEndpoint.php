<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;

class CityEndpoint extends BaseEndpoint
{
    protected $cacheName = 'city';
    protected $endpoint = 'city';
    // protected $cacheForever = true;

    /**
     * Get all city
     *
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function get()
    {
        return $this->makeRequest();
    }

    /**
     * Find city
     *
     * @param string $id
     * @param string|null $province
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function find($id, $province = null)
    {
        $this->whereID($id);

        if(!is_null($province)){
            $this->province($province);
        }

        return $this->makeRequest();
    }

    /**
     * Where city id
     *
     * @param string $id
     * @return self
     */
    public function whereID($id)
    {
        $this->addPayload([
            'id' => $id,
        ]);
        return $this;
    }

    /**
     * Where city id
     *
     * @param string $id
     * @return self
     */
    public function whereCityID($id)
    {
        $this->whereID($id);
        return $this;
    }

    /**
     * Where province id
     *
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
