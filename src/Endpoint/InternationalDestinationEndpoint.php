<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;

class InternationalDestinationEndpoint extends BaseEndpoint
{
    protected $cacheName = 'internationalDestination';
    protected $endpoint = 'internationalDestination';
    protected $apiVersion = 'v2';
    // protected $cacheForever = true;

    /**
     * Get all international destination
     *
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function get()
    {
        return $this->makeRequest();
    }

    /**
     * Find international destination
     *
     * @param string|null $countryID
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function find($countryID)
    {
        $this->country($countryID);

        return $this->makeRequest();
    }

    /**
     * Where country id
     *
     * @param string $id
     * @return self
     */
    public function country($id)
    {
        $this->addPayload([
            'id' => $id,
        ]);
        return $this;
    }
}
