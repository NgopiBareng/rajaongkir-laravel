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

    /** @var string */
    protected $apiKey;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->setAccountType(config('rajaongkir.account_type'));
        $this->setApiKey(config('rajaongkir.api_key'));

        $this->initHttpClient();
    }

    /**
     * @return self
     */
    public static function make()
    {
        return (new self());
    }

    /**
     * Set account type
     *
     * @param string $accountType
     * @return self
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
        $this->initHttpClient();
        return $this;
    }

    /**
     * Set api key
     *
     * @param string $apiKey
     * @return self
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->initHttpClient();
        return $this;
    }

    /**
     * Set config
     *
     * @param array $config
     * @return self
     */
    public function setConfig(array $config)
    {
        $this->setAccountType(Arr::get($config, 'account_type', $this->getDefaultAccount('key')));
        $this->setApiKey(Arr::get($config, 'api_key'));
        return $this;
    }

    /**
     * @return self
     */
    private function initHttpClient()
    {
        $httpClient = HTTPClient::make($this->getBaseUrl(), $this->apiKey);

        $httpClient->getCache()->cache(config('rajaongkir.cache.enabled'));
        $this->setHTTPClient($httpClient);
        return $this;
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
                'default' => true,
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
     * Get default account type
     *
     * @param string|null $key
     * @return string|array|null
     */
    public function getDefaultAccount($key = null)
    {
        $result = Arr::first($this->listAccountTypes(), function ($value, $key) {
            return Arr::get($value , 'default', false) === true;
        });
        return Arr::get($result, $key);
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
