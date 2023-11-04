<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Commands\MakeUserCommand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->commands([
            MakeUserCommand::class
        ]);
    }
}
