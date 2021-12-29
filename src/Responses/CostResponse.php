<?php

namespace Ngopibareng\RajaongkirLaravel\Responses;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Ngopibareng\RajaongkirLaravel\RajaongkirResponse;

class CostResponse extends RajaongkirResponse
{
    public function __construct($response)
    {
        parent::__construct($response);
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
     * Get origin detail
     *
     * @param string|null $key
     * @return array
     */
    public function originDetail($key = null)
    {
        return $this->getResponse('origin_details', $key);
    }

    /**
     * Get destination detail
     *
     * @param string|null $key
     * @return array
     */
    public function destinationDetail($key = null)
    {
        return $this->getResponse('destination_details', $key);
    }
}
