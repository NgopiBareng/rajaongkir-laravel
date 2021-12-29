<?php

namespace Ngopibareng\RajaongkirLaravel\Responses;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Ngopibareng\RajaongkirLaravel\RajaongkirResponse;

class WaybillResponse extends RajaongkirResponse
{
    public function __construct($response)
    {
        parent::__construct($response);
    }

    /**
     * Get response
     *
     * @return array
     */
    public function get()
    {
        return Arr::get($this->response, 'result');
    }

    /**
     * Get response result
     *
     * @param string $group
     * @param string|null $key
     * @return array
     */
    private function getResponseResult($group, $key = null)
    {
        return $this->getResponse($group, $key, $this->getResult());
    }

    /**
     * Get summary
     *
     * @param string|null $key
     * @return array
     */
    public function summary($key = null)
    {
        return $this->getResponseResult('summary', $key);
    }

    /**
     * Get details
     *
     * @param string|null $key
     * @return array
     */
    public function details($key = null)
    {
        return $this->getResponseResult('details', $key);
    }

    /**
     * Get manifests
     *
     * @param string|null $key
     * @return array
     */
    public function manifests($key = null)
    {
        return $this->getResponseResult('manifest', $key);
    }

    /**
     * Get delivery status
     *
     * @param string|null $key
     * @return array
     */
    public function deliveryStatus($key = null)
    {
        return $this->getResponseResult('delivery_status', $key);
    }
}
