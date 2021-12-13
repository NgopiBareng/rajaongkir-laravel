<?php

namespace Ngopibareng\RajaongkirLaravel;

use Illuminate\Support\Facades\Cache;

class CacheRequest
{
    /** @var bool */
    protected $cache = false;

    /** @var bool */
    protected $cacheForever = false;

    /** @var string */
    protected $prefix = 'rajaongkir';

    /** @var string */
    protected $cacheName = '';

    /** @var int */
    protected $TTL = 60 * 10;

    /** @var array */
    private $supportedCacheDrivers = ['file', 'redis'];

    public function __construct()
    {
        $this->cache = true; //auto cache
    }

    public static function make()
    {
        $class = get_called_class();
        return (new $class());
    }

    /**
     * Set cache prefix
     *
     * @param string $prefix
     * @return self
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * Get prefix cache
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set cache name
     *
     * @param string $name
     * @return self
     */
    public function setCacheName($name)
    {
        $this->cacheName = $name;
        return $this;
    }

    /**
     * Get cache name
     *
     * @return string
     */
    public function getCacheName()
    {
        return $this->prefix . $this->cacheName;
    }

    /**
     * Set TTL cache
     *
     * @param integer $TTL
     * @return self
     */
    public function setTTL($TTL)
    {
        $this->TTL = $TTL;
        return $this;
    }

    /**
     * Get TTL cache
     *
     * @return integer
     */
    public function getTTL()
    {
        return $this->TTL;
    }

    /**
     * Toggle disable/enable cache
     *
     * @param boolean $toggle
     * @return self
     */
    public function cache($toggle = true)
    {
        $this->cache = $toggle;
        return $this;
    }

    /**
     * Is Cache enabled ?
     *
     * @return bool
     */
    public function isCache()
    {
        return $this->cache;
    }

    /**
     * Disable cache (No cache)
     *
     * @return self
     */
    public function noCache()
    {
        $this->cache(false);
        return $this;
    }

    /**
     * Toggle enable/disable cache forever
     *
     * @param bool $toggle
     * @return self
     */
    public function cacheForever($toggle = false)
    {
        if($toggle){
            $this->cache(true);
        }
        $this->cacheForever = $toggle;
        return $this;
    }

    /**
     * Is Cache forever ?
     *
     * @return bool
     */
    public function isCacheForever()
    {
        return $this->cacheForever;
    }

    /**
     * Clear cache
     *
     * @return self
     */
    public function clear()
    {
        Cache::forget($this->getCacheName());
        return $this;
    }

    /**
     * Cache is exists ?
     *
     * @return bool
     */
    public function isExists()
    {
        return Cache::has($this->getCacheName());
    }

    /**
     * Cache is cached ?
     *
     * @return bool
     */
    public function isCached()
    {
        return $this->isExists();
    }

    /**
     * Get cache
     *
     * @return mixed
     */
    public function get()
    {
        return Cache::get($this->getCacheName());
    }

    /**
     * Get cache store with driver
     *
     * @return \Illuminate\Contracts\Cache\Repository
     */
    private function getCacheStore()
    {
        $driver = config('rajaongkir.cache.store');
        if(!in_array($driver, $this->supportedCacheDrivers)){
            $driver = 'file';
        }
        return Cache::store($driver);
    }

    /**
     * Build cache
     *
     * @param callable|\Closure $callback
     * @return mixed
     */
    public function build($callback)
    {
        if(!$this->cache)return $callback;

        if($this->cacheForever){
            return $this->getCacheStore()->rememberForever($this->getCacheName(), $callback);
        }
        return $this->getCacheStore()->remember($this->getCacheName(), $this->TTL, $callback);
    }
}
