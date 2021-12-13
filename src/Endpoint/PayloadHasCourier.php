<?php

namespace Ngopibareng\RajaongkirLaravel\Endpoint;

use Illuminate\Support\Arr;

trait PayloadHasCourier {
    /**
     * @param array $couriers
     * @return self
     */
    public function couriers($couriers)
    {
        $this->addPayload([
            'courier' => implode(":", Arr::wrap($couriers))
        ]);
        return $this;
    }

    /**
     * @param string $courier
     * @return self
     */
    public function courier($courier)
    {
        $this->couriers($courier);
        return $this;
    }
}
