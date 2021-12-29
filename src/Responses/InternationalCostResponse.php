<?php

namespace Ngopibareng\RajaongkirLaravel\Responses;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Ngopibareng\RajaongkirLaravel\RajaongkirResponse;

class InternationalCostResponse extends RajaongkirResponse
{
    public function __construct($response)
    {
        parent::__construct($response);
    }

    /**
     * Get origin
     *
     * @param string|null $key
     * @return array
     */
    public function origin($key = null)
    {
        return $this->getResponse('origin_details', $key);
    }

    /**
     * Get destination
     *
     * @param string|null $key
     * @return array
     */
    public function destination($key = null)
    {
        return $this->getResponse('destination_details', $key);
    }
}
