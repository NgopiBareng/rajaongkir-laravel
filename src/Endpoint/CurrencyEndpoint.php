<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;

class CurrencyEndpoint extends BaseEndpoint
{
    protected $cacheName = 'currency';
    protected $endpoint = 'currency';
    protected $disableCache = true;

    /**
     * Get latest currency
     *
     * @return self
     */
    public function get()
    {
        $this->makeRequest();
        return $this;
    }
}
