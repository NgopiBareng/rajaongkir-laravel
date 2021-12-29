<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;

class SubdistrictEndpoint extends BaseEndpoint
{
    protected $cacheName = 'subdistrict';
    protected $endpoint = 'subdistrict';
    // protected $cacheForever = true;

    /**
     * Get all district
     *
     * @return self
     */
    public function get($city)
    {
        $this->city($city);
        $this->makeRequest();
        return $this;
    }

    /**
     * Find district
     *
     * @param string $city
     * @param string|null $id
     * @return self
     */
    public function find($city, $id = null)
    {
        $this->city($city);

        if(!is_null($city)){
            $this->whereID($id);
        }

        $this->makeRequest();
        return $this;
    }

    /**
     * Where district id
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
     * Where city id
     *
     * @param string $city
     * @return self
     */
    public function city($city)
    {
        $this->addPayload([
            'city' => $city
        ]);
        return $this;
    }
}
