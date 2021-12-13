<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\BaseEndpoint;

class CurrencyEndpoint extends BaseEndpoint
{
    protected $cacheName = 'currency';
    protected $endpoint = 'currency';
    protected $disableCache = true;

    public function get()
    {
        return $this->httpClient->request($this->endpoint);
    }
}
