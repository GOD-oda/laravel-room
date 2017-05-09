<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Service_Twilio;

class TwilioServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(Service_Twilio::class, function () {
            return new Service_Twilio(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
        });
    }
}
