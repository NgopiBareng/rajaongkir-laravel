<?php

namespace Ngopibareng\RajaongkirLaravel;

use Illuminate\Support\Facades\Cache;
use Ngopibareng\RajaongkirLaravel\CacheRequest;

class CacheManager
{
    /** @var \Ngopibareng\RajaongkirLaravel\CacheRequest */
    protected $cacheRequest;

    public function __construct()
    {
        $this->cacheRequest(CacheRequest::make());
    }

    public static function make()
    {
        $class = get_called_class();
        return (new $class());
    }

    /**
     * @param \Ngopibareng\RajaongkirLaravel\CacheRequest $cacheRequest
     * @return self
     */
    public function cacheRequest($cacheRequest)
    {
        $this->cacheRequest = $cacheRequest;
        return $this;
    }

    /**
     * Clear cached request raja ongkir
     *
     * @return void
     */
    public function clearAll()
    {

    }
}
