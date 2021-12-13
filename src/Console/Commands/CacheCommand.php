<?php

namespace Ngopibareng\RajaongkirLaravel\Console\Commands;

use Illuminate\Console\Command;
use Ngopibareng\RajaongkirLaravel\CacheManager;

class CacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rajaongkir:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache rajaongkir';

    /** @var \Ngopibareng\RajaongkirLaravel\CacheManager */
    protected $cacheManager;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->cacheManager = CacheManager::make();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
