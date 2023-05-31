<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        bcscale(2);
    }

    public function boot()
    {
        Paginator::useBootstrap();
    }
}
