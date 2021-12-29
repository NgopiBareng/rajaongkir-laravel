<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Ngopibareng\RajaongkirLaravel\Endpoint\PayloadApp;
use Ngopibareng\RajaongkirLaravel\RajaongkirResponse;

use Illuminate\Support\Str;

class BaseEndpoint
{
    use PayloadApp;

    /** @var \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient */
    protected $httpClient;

    /** @var string */
    protected $cacheName;

    /** @var string */
    protected $baseUrl;

    /** @var string */
    protected $endpoint;

    /** @var string */
    protected $apiVersion;

    /** @var array */
    protected $payloads = [];

    /** @var bool */
    protected $disableCache = false;

    /** @var bool */
    protected $cacheForever = false;

    /**
     * @param \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient|null $httpClient
     * @return void
     */
    public function __construct($httpClient = null)
    {
        $this->setHTTPClient($httpClient);
    }

    /**
     * @param \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient|null $httpClient
     * @return self
     */
    public static function make($httpClient = null)
    {
        $class = get_called_class();
        return (new $class($httpClient));
    }

    /**
     * Build base url endpoint
     *
     * @return self
     */
    public function buildUrl()
    {
        $url = '';
        if(!empty($this->baseUrl)){
            $url = $this->baseUrl;
        }

        if(!empty($this->apiVersion)){
            $url .= $this->apiVersion;
        }
        $this->httpClient->setBaseUrl($url);
        return $this;
    }

    /**
     * Set HTTP Client
     *
     * @param \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient $httpClient
     * @return self
     */
    public function setHTTPClient($httpClient)
    {
        $this->httpClient = $httpClient;

        $this->baseUrl = $this->httpClient->baseUrl;
        $this->buildUrl();

        $this->httpClient->setCacheName($this->cacheName);

        $this->getCache()
        ->setCacheName($this->cacheName)
        ->cache(!$this->disableCache)
        ->cacheForever($this->cacheForever);
        return $this;
    }

    /**
     * Get HTTP Client
     *
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function getHTTPClient()
    {
        return $this->httpClient;
    }

    /**
     * Get cache request
     *
     * @return \Ngopibareng\RajaongkirLaravel\CacheRequest
     */
    public function getCache()
    {
        return $this->httpClient->getCache();
    }

    /**
     * Add payloads to request
     *
     * @param array $payloads
     * @return self
     */
    public function addPayload($payloads)
    {
        $this->payloads = array_merge($this->payloads, $payloads);
        return $this;
    }

    /**
     * Set payloads to request
     *
     * @param array $payloads
     * @return self
     */
    public function setPayloads($payloads)
    {
        $this->payloads = $payloads;
        return $this;
    }

    /**
     * Make request
     *
     * @param string|null $method
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function makeRequest($method = 'GET')
    {
        $endpoints = [];
        if(!empty($this->apiVersion)){
            $endpoints[] = $this->apiVersion;
        }
        $endpoints[] = $this->endpoint;

        $endpoint = implode('/', $endpoints);
        $appendSlash = !Str::endsWith($endpoint, '/');
        $endpoint .= ($appendSlash ? '/' : '');
        return $this->httpClient->request($endpoint, $this->payloads, $method);
    }

    public function responseClass()
    {
        return RajaongkirResponse::class;
    }

    public function response()
    {
        $class = $this->responseClass();
        return (new $class($this->httpClient->toArray()));
    }

    public function count()
    {

    }

    public function search()
    {

    }
}
