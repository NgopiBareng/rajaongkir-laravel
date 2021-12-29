<?php

namespace Ngopibareng\RajaongkirLaravel;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

use Ngopibareng\RajaongkirLaravel\HttpClients\GuzzleClient as HTTPClient;
use Ngopibareng\RajaongkirLaravel\Courier;
use Ngopibareng\RajaongkirLaravel\Widget;
use Ngopibareng\RajaongkirLaravel\CacheManager;

use Ngopibareng\RajaongkirLaravel\HasEndpoint;

class RajaongkirLaravel
{
    use HasEndpoint;

    /** @var \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient */
    protected $httpClient;

    /** @var string */
    protected $accountType;

    /** @var array */
    protected $baseUrl = [
        'starter' => 'https://api.rajaongkir.com/starter/',
        'basic' => 'https://api.rajaongkir.com/basic/',
        'pro' => 'https://pro.rajaongkir.com/api/'
    ];

    /**
     * @return void
     */
    public function __construct()
    {
        $this->accountType = config('rajaongkir.account_type');
        $baseUrl = Arr::get($this->baseUrl, $this->accountType);
        $httpClient = HTTPClient::make($baseUrl, config('rajaongkir.api_key'));

        $httpClient->getCache()->cache(config('rajaongkir.cache.enabled'));
        $this->setHTTPClient($httpClient);
    }

    /**
     * @return self
     */
    public static function make()
    {
        return (new self());
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

    /**
     * @param \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient $httpClient
     * @return self
     */
    public function setHTTPClient($httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return \Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient
     */
    public function httpClient()
    {
        return $this->httpClient;
    }

    /**
     * Get supported couriers
     *
     * @return \Ngopibareng\RajaongkirLaravel\Courier
     */
    public function courier()
    {
        return Courier::make($this->accountType);
    }

    /**
     * @return string
     */
    public function accountType()
    {
        return $this->accountType;
    }

    /**
     * Build widget raja ongkir (iframe)
     *
     * @return \Ngopibareng\RajaongkirLaravel\Widget
     */
    public function widget()
    {
        return Widget::make();
    }

    public function fake()
    {

    }

    public function cacheManager()
    {
        return CacheManager::make();
    }
}
