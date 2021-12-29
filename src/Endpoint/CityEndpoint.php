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
     * @return self
     */
    public function get()
    {
        $this->makeRequest();
        return $this;
    }

    /**
     * Find city
     *
     * @param string $id
     * @param string|null $province
     * @return self
     */
    public function find($id, $province = null)
    {
        $this->whereID($id);

        if(!is_null($province)){
            $this->province($province);
        }

        $this->makeRequest();
        return $this;
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
