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
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function get()
    {
        return $this->makeRequest();
    }

    /**
     * Find international origin
     *
     * @param string $city
     * @param string|null $province
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function find($city, $province = null)
    {
        $this->city($city);

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
