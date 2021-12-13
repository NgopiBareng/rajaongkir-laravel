<?php

namespace Ngopibareng\RajaongkirLaravel\Contracts;

interface HttpClientContract
{
    /**
     * @param string $apiKey
     * @return self
     */
    public function setApiKey(string $apiKey): self;

    /**
     * @param string $baseUrl
     * @return self
     */
    public function setClient($baseUrl): self;

    /**
     * @param string $endpoint
     * @param array $payloads
     * @param string $method
     *
     * @return array
     */
    public function makeRequest($endpoint, array $payloads = [], $method = 'GET'): array;
}
