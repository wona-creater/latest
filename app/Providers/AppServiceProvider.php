<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\schema\Builder;


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
        //
        Builder::defaultStringLength(191); // Set default to 191
    }
}
