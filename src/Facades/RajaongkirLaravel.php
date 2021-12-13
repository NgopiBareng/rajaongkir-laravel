<?php

namespace Ngopibareng\RajaongkirLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class RajaongkirLaravel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'rajaongkir-laravel';
    }
}
