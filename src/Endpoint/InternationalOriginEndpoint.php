<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;

class InternationalOriginEndpoint extends BaseEndpoint
{
    protected $cacheName = 'internationalOrigin';
    protected $endpoint = 'internationalOrigin';
    protected $apiVersion = 'v2';
    // protected $cacheForever = true;

    /**
     * Get all international origin
     *
     * @return self
     */
    public function get()
    {
        $this->makeRequest();
        return $this;
    }

    /**
     * Find international origin
     *
     * @param string $city
     * @param string|null $province
     * @return self
     */
    public function find($city, $province = null)
    {
        $this->city($city);

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
    public function city($id)
    {
        $this->addPayload([
            'id' => $id,
        ]);
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
