<?php

/**
 * Config Raja Ongkir
 *
 * @see https://rajaongkir.com/
 */
return [
    'api_key' => env('RAJAONGKIR_API_KEY'),

    /**
     * Supprted Account Types :
     * starter, basic, pro
     */
    'account_type' => env('RAJAONGKIR_ACCOUNT_TYPE', 'starter'),

    /**
     * Cache every request
     */
    'cache' => [

        'enabled' => env('RAJAONGKIR_CACHE_ENABLED', false),

        /*
         * Supported: "file", "redis"
         */

        'store' => env('RAJAONGKIR_CACHE_DRIVER', 'file'),
    ],
];
