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
     * @return self
     */
    public function get()
    {
        $this->makeRequest();
        return $this;
    }

    /**
     * Find international destination
     *
     * @param string|null $countryID
     * @return self
     */
    public function find($countryID)
    {
        $this->country($countryID);

        $this->makeRequest();
        return $this;
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
