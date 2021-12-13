<?php

namespace Ngopibareng\RajaongkirLaravel\HttpClients;

use Ngopibareng\RajaongkirLaravel\HttpClients\BaseClient as BaseClient;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class GuzzleClient extends BaseClient
{
    /**
     * @param string|null $baseUrl
     * @param string|null $apiKey
     * @return void
     */
    public function __construct($baseUrl = null, $apiKey = null)
    {
        $this->setCacheRequest();
        $this->setClient($baseUrl);
        $this->setApiKey($apiKey);
    }

    /**
     * @param string|null $baseUrl
     * @param string|null $apiKey
     * @return self
     */
    public static function make($baseUrl = null, $apiKey = null)
    {
        $class = get_called_class();
        return (new $class($baseUrl, $apiKey));
    }

    public function setClient($baseUrl): self
    {
        $this->setBaseUrl($baseUrl);

        $this->client = new Client(
            [
                'base_uri' => $this->baseUrl
            ]
        );
        return $this;
    }

    public function makeRequest($endpoint, array $payloads = [], $method = 'GET'): array
    {
        $payloads = array_merge([
            'key' => $this->apiKey
        ], $payloads);

        $payloads = [
            'query' => $payloads
        ];
        $this->body = [];
        try {
            $this->response = $this->client->request($method, $endpoint, $payloads);

            $this->status = $this->response->getStatusCode();
            $this->body = json_decode($this->response->getBody(), true);
            ;
        } catch (ClientException $e) {
            $this->status = false;
            $this->logError($e);
        }
        return $this->body;
    }
}