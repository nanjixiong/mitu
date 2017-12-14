<?php

namespace App\Providers;

use App\Providers\Mitu\Serve;
use Illuminate\Support\ServiceProvider;

class MituServeiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //        parent::boot();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('mituserv', function () {
            return new Serve();
        });
    }
}
