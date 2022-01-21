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

    /**
     * @return void
     */
    public function __construct()
    {
        $this->accountType = config('rajaongkir.account_type');
        $httpClient = HTTPClient::make($this->getBaseUrl(), config('rajaongkir.api_key'));

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
     * List account types
     *
     * @return array
     */
    public function listAccountTypes()
    {
        return [
            'starter' => [
                'key' => 'starter',
                'description' => 'starter',
                'base_url' => 'https://api.rajaongkir.com/starter/',
            ],
            'basic' => [
                'key' => 'basic',
                'description' => 'basic',
                'base_url' => 'https://api.rajaongkir.com/basic/',
            ],
            'pro' => [
                'key' => 'pro',
                'description' => 'pro',
                'base_url' => 'https://pro.rajaongkir.com/api/',
            ]
        ];
    }

    /**
     * Get config by account type
     *
     * @param string|null $key
     * @return string|array|null
     */
    public function getConfig($key = null)
    {
        $config = Arr::get($this->listAccountTypes(), $this->accountType(), []);
        return Arr::get($config, $key);
    }

    /**
     * Get base url by account type
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->getConfig('base_url');
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
