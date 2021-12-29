<?php

namespace Ngopibareng\RajaongkirLaravel\HttpClients;

use Ngopibareng\RajaongkirLaravel\Contracts\HttpClientContract;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Ngopibareng\RajaongkirLaravel\CacheRequest;

abstract class BaseClient implements HttpClientContract
{
    /** @var bool */
    protected $status = false;

    /** @var mixed */
    protected $response;

    /** @var array */
    protected $body;

    /** @var mixed */
    protected $client;

    /** @var string */
    public $baseUrl;

    /** @var string */
    protected $apiKey;

    /** @var \Ngopibareng\RajaongkirLaravel\CacheRequest */
    protected $cacheRequest;

    /** @var string */
    protected $cacheName;

    /**
     * @return self
     */
    public function setCacheRequest()
    {
        $this->cacheRequest = CacheRequest::make()->setCacheName($this->cacheName);
        return $this;
    }

    /**
     * @return \Ngopibareng\RajaongkirLaravel\CacheRequest
     */
    public function getCache()
    {
        return $this->cacheRequest;
    }

    /**
     * @param string $cacheName
     * @return self
     */
    public function setCacheName($cacheName)
    {
        $this->cacheName = $cacheName;
        return $this;
    }

    /**
     * @param string $baseUrl
     * @return self
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @param string $apiKey
     * @return self
     */
    public function setApiKey($apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @param string $endpoint
     * @param array $payloads
     * @param string $method
     *
     * @return self
     */
    public function request($endpoint, array $payloads = [], $method = 'GET')
    {
        // dump($this->cacheName);
        // dd($this->getCache()->getCacheName());
        $cacheName = $this->getCache()->getPrefix() . $this->cacheName;

        if(!empty($payloads)){
            $cacheName .= $this->hashPayload($payloads);
        }
        // dd($cacheName);
        $this->setCacheName($cacheName);
        $this->getCache()->setCacheName($cacheName);

        if($this->getCache()->isCache()){
            $this->status = true;

            $this->body = $this->getCache()
            ->build(function () use($endpoint, $payloads, $method) {
                return $this->makeRequest($endpoint, $payloads, $method);
            });
            return $this;
        }

        $this->makeRequest($endpoint, $payloads, $method);
        return $this;
    }

    /**
     * Hash payloads
     *
     * @param array $payloads
     * @return string
     */
    protected function hashPayload(array $payloads = [])
    {
        return md5(serialize($payloads));
    }

    /**
     * Log Error
     *
     * @param \Throwable $th
     *
     * @return void
     **/
    protected function logError(\Throwable $th)
    {
        Log::error($th->getMessage(), ['trace' => $th->getTraceAsString()]);
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $asArray
     * @return object|array
     */
    public function getBody($asArray = false)
    {
        if(!$asArray){
            $json = json_encode($this->body, JSON_NUMERIC_CHECK);
            return json_decode($json);
        }
        return $this->body;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->getBody(true);
    }

    /**
     * @return object
     */
    public function toObject()
    {
        return $this->getBody();
    }

    /**
     * @return Illuminate\Support\Collection
     */
    public function toCollection()
    {
        return Collection::make($this->toArray());
    }

    public function response()
    {
        return \Ngopibareng\RajaongkirLaravel\RajaongkirResponse::make($this->toArray());
    }

    public function successfull()
    {

    }

    public function failed()
    {

    }
}
