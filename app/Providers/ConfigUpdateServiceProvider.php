<?php

namespace App\Providers;

use App\Services\Connection;
use Closure;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ConfigUpdateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            config_path('database.php'), 'database'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
//    public function provides(): array
//    {
//        return [Connection::class];
//    }
}
