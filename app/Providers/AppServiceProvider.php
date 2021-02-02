<?php

namespace App\Providers;

//This was disabled to allow the other pagination
//use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Tell Laravel we want to use Bootstrap rather than Tailwind.
        Paginator::useBootstrap();
    }
}
