<?php

namespace Ngopibareng\RajaongkirLaravel;

use Illuminate\Support\ServiceProvider;

use Ngopibareng\RajaongkirLaravel\Console\Commands\CacheCommand;
use Ngopibareng\RajaongkirLaravel\Console\Commands\CacheClearCommand;

class RajaongkirLaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ngopibareng');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ngopibareng');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rajaongkir.php', 'rajaongkir');

        // Register the service the package provides.
        $this->app->singleton('rajaongkir-laravel', function ($app) {
            return new RajaongkirLaravel;
        });

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('RajaOngkir', 'Ngopibareng\RajaongkirLaravel\Facades\RajaongkirLaravel');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['rajaongkir-laravel'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/rajaongkir.php' => config_path('rajaongkir.php'),
        ], 'rajaongkir.config');

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-rajaongkir'),
        ], 'rajaongkir-lang');

        // Registering package commands.
        $this->commands([
            CacheCommand::class,
            CacheClearCommand::class
        ]);
    }
}
