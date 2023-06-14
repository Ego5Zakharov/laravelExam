<?php

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;
use Twilio\Rest\Client;

class TwilioServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            $sid = config('twilio.sid');
            $token = config('twilio.token');
            return new Client($sid,$token);
        });
    }

    public function boot()
    {
    }
}
